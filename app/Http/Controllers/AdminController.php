<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\Encuestas;
use App\Models\Solicitudes;
use PhpParser\Node\Scalar\Encapsed;

class AdminController extends Controller
{

function perfil($id,$ids,$ide){

    $encuesta =  DB::select('select * from encuestas where id_encuesta = :id', ['id' => $ide]);
    
$users = User::find($id);



    return view('admin/perfil-solicitante',compact('users','id','ids','ide','encuesta'));
}



function acept(Request $request){

    
$datos = $request->all();
$id = $datos['user'];


$usuario = User::findOrFail($id);

$usuario->tipo = $datos['tipo'];
$usuario->descripcion_user = $datos['bio'];
$usuario->dpi = $datos['dpi'];
$usuario->save();
$ids = $datos['solicitud'];
$ide = $datos['encuesta'];

Solicitudes::where('id_solicitud', $ids)->delete();
Encuestas::where('id_encuesta', $ide)->delete();

$encuesta =  DB::select('select * from encuestas where id_encuesta = :id', ['id' => $ide]);
    





// aqui seria nitido mandar un correo electrónico notiicandole a la persona que su solicitud fue aceptada
$mensaje = "El usuario ha sido aceptado como ajq'ij";
   
return redirect(action('AdminController@index'))->with('mensaje',$mensaje);
}

function negation(Request $request){

    
    $datos = $request->all();
    $id = $datos['user'];
    $ids = $datos['solicitud'];
    $ide = $datos['encuesta'];
    
    Solicitudes::where('id_solicitud', $ids)->delete();
    Encuestas::where('id_encuesta', $ide)->delete();
     
  


  $mensaje = "El usuario ha sido rechazado";



    // aqui seria nitido mandar un correo electrónico notiicandole a la persona que su solicitud fue aceptada
    
   return redirect(action('AdminController@index'))->with('mensaje',$mensaje);
        // return view('admin/cp',compact('mensaje'));
    }



    function index(){

if(auth()->user()->tipo != 39){
    return redirect()->route('home');
}



        $data = Encuestas::join('solicitudes_profesionales', 'solicitudes_profesionales.id_encuesta', '=', 'encuestas.id_encuesta')
        ->join('users', 'users.id', '=', 'solicitudes_profesionales.id_usuario')
                ->paginate(5);






        // $eventos = DB::select("select * from agendas  inner join users on agendas.id_usuario = users.id where fecha >= '$fee'
        // and (cliente=".auth()->user()->id." or id_usuario = ".auth()->user()->id.")   ORDER BY fecha");


        // $eventos = new Paginator($eventoss, 1);

        // $eventos = $this->arrayPaginator($eventos);





    return view('admin/cp', compact('data'));
    }

  





}
