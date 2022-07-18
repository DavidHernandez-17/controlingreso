@extends('Shared.base')

@section('content')

<div class="container">
    <div class="container">
        <a class="btn btn-primary mt-3 mb-3 btn-sm" href="/users/create"><i class="fa-solid fa-circle-plus"></i> Crear usuario</a>
    </div>

    @if(session('info'))
    <li class="alert alert-success">{{ session('info') }}</li>
    @endif


    <!-- Nueva tabla -->
    <div class="card text-center container">
        <div class="card-header">
            <h3 class="card-title"><strong><i class="fa-solid fa-user-check"></i> Usuarios</strong></h3>
        </div>
        <!--card-header -->
        <div class="card-body">
            <table id="tableusers" class="table table-bordered  text-center">
                <thead style="background-color: #007eff;" class="text-light">
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Correo electrónico</th>
                        <th class="text-center">Fecha de modificación</th>
                        <th class="text-center">Área</th>
                        <th class="text-center">Rol Asignado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $User as $User )
                    <tr>
                        <td> {{ $User->name }} </td>
                        <td> {{ $User->email }} </td>
                        <td> {{ $User->updated_at }} </td>
                        <td> {{ $User->area }} </td>
                        <td> {{ $User->roles[0]['name'] }} </td>
                        <td>
                            <a class="btn btn-outline-secondary btn-sm" href="/users/{{ $User->id }}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="btn btn-outline-primary btn-sm" href="/users/{{ $User->id }}/edit/password"><i class="fa-solid fa-key"></i></a>
                            <a class="btn btn-outline-danger btn-sm" href="/users/{{ $User->id }}/confirmdelete"><i class="fa-solid fa-circle-minus"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>

<script>
    $(function() {
        $("#tableusers").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>

@endsection