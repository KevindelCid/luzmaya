@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">

     <h3>Se muestran las solicitudes pendientes de Profesionales...</h3>
     <table class="table">
         <thead>
             <tr>
                 <th>Fecha</th>
                 <th>Titulo</th>
                 <th>Hora de inicio</th>
                 <th>Titular</th>
                 <th>Acciones</th>

             </tr>
         </thead>


@foreach($data as $da)

{{ $da->name }}
@endforeach
{{ $data->links() }}
         <tbody>
          
</div>
@endsection 