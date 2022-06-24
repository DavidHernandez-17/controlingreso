@extends('Shared.base')

@section('content')
<div class="container">
    <div class="container">
        <a class="btn btn-primary mt-3 mb-4" href="/employees/create"><i class="fa-solid fa-circle-plus"></i> Crear colaborador</a>
        <a class="btn mt-3 mb-4 text-light" style="background-color: orange" href="/employees/import/view"><i class="fa-solid fa-upload"></i> Importar</a>
    </div>


    <table id="tableemployees" class="table table-striped text-center table-borderless cell-border">
        <thead>
            <th colspan="12" class="text-center mt-3"><h5><i class="fa-solid fa-user-gear"></i><strong> Colaboradores</strong></h5></th>
            <tr>
                <th class="text-center">Cédula</th>
                <th class="text-center">Nombre completo</th>
                <th class="text-center">Área</th>
                <th class="text-center">Sede</th>
                <th class="text-center">Fecha de actualización</th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
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
        </tbody>
    </table>
</div>  

<script>
    $(document).ready(function() {
    $('#tableemployees').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
     });
    });
</script>


@endsection