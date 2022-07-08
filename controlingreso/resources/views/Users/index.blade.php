@extends('Shared.base')

@section('content')
<div class="container">
    <div class="container">
        <a class="btn btn-primary mt-3 mb-4" href="/users/create"><i class="fa-solid fa-circle-plus"></i> Crear usuario</a>
    </div>

    @if(session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    @if(session('info_password'))
        <div class="alert alert-success">{{ session('info_password') }}</div>
    @endif


    <table id="tableusers" class="table table-striped text-center table-borderless cell-border">
        <thead>
            <th colspan="12" class="text-center mt-3">
                <h5><strong><i class="fa-solid fa-user-check"></i> Usuarios</strong></h5>
            </th>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Correo electrónico</th>
                <th class="text-center">Fecha de creación</th>
                <th class="text-center">Fecha de modificación</th>
                <th class="text-center">Rol Asignado</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach( $User as $User )
            <tr>
                <td> {{ $User->name }} </td>
                <td> {{ $User->email }} </td>
                <td> {{ $User->created_at }} </td>
                <td> {{ $User->updated_at }} </td>
                <td>  </td>
                <td>
                    <a class="btn btn-outline-secondary" href="/users/{{ $User->id }}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-outline-primary" href="/users/{{ $User->id }}/edit/password" ><i class="fa-solid fa-key"></i></a>
                    <a class="btn btn-outline-danger" href="/users/{{ $User->id }}/confirmdelete"><i class="fa-solid fa-circle-minus"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#tableusers').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>


@endsection