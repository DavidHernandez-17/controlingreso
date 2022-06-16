@extends('Shared.base')

@section('content')
<div>
    <h4 class="container mt-3"><i class="fa-solid fa-user-gear"></i> Colaboradores</h4>
    <div class="container">
        <a class="btn btn-outline-primary mt-3" href="/employees/create"><i class="fa-solid fa-circle-plus"></i> Crear colaborador</a>
    </div>

    <table class="table table-striped mt-3 table-bordered text-center container">
        <th colspan="12" class="text-center"> Colaboradores</th>
        <tr>
            <th>Cédula</th>
            <th>Nombre completo</th>
            <th>Área</th>
            <th>Sede</th>
            <th>Fecha de actualización</th>
            <th></th>
        </tr>

        @foreach( $Employees as $Employee )
        <tr>
            <td> {{ $Employee->identification }} </td>
            <td> {{ $Employee->fullname }} </td>
            <td> {{ $Employee->area }} </td>
            <td> {{ $Employee->site }} </td>
            <td> {{ $Employee->updated_at }} </td>
            <td> 
                <a class="btn btn-outline-secondary" href="/employees/{{ $Employee->id }}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-outline-danger" href="/employees/{{ $Employee->id }}/confirmdelete"><i class="fa-solid fa-circle-minus"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>  

@endsection