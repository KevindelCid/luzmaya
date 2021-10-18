<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\Encuestas;

class AdminController extends Controller
{

    function index(){




        // date_default_timezone_set('America/Guatemala');
        // $fee =  Carbon::now()->format('Y-m-d');


        $data = Encuestas::join('solicitudes_profesionales', 'solicitudes_profesionales.id_encuesta', '=', 'encuestas.id_encuesta')
        ->join('users', 'users.id', '=', 'solicitudes_profesionales.id_usuario')
                ->paginate(1);




        // $eventos = DB::select("select * from agendas  inner join users on agendas.id_usuario = users.id where fecha >= '$fee'
        // and (cliente=".auth()->user()->id." or id_usuario = ".auth()->user()->id.")   ORDER BY fecha");


        // $eventos = new Paginator($eventoss, 1);

        // $eventos = $this->arrayPaginator($eventos);





    return view('admin/cp', compact('data'));
    }

    public function arrayPaginator($array, $request)
    {
        $page = $request->input('page',1);
        
        $perPage = 3; // este es el numero de registros que se mostrarán en cada pagina de la paginacion
        $offset = ($page * $perPage) - $perPage;
    
        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }





}
