@extends('Shared.base')

@section('content')
<div class="container">

    @if( session('info') )
    <li class="alert alert-success mt-3">{{ session('info') }}</li>
    @endif


    <div class="container">
        <a class="btn btn-primary mt-3 mb-3 btn-sm" href="/employees/create"><i class="fa-solid fa-circle-plus"></i> Crear colaborador</a>
        <a class="btn mt-3 mb-3 text-light btn-sm" style="background-color: orange" href="/employees/import/view"><i class="fa-solid fa-upload"></i> Importar</a>
        <a class="btn mt-3 mb-3 btn-sm btn-secondary" href="{{route('qr_index')}}"><i class="fa-solid fa-qrcode"></i> Generador QR</a>
    </div>

    <!-- Nueva tabla -->
    <div class="card text-center">
        <div class="card-header">
            <h3 class="card-title"><i class="fa-solid fa-user-gear"></i><strong> Colaboradores </strong></h3>
        </div>
        <!--card-header -->
        <div class="card-body">
            <table id="tableemployee" class="table table-bordered  text-center">
                <thead style="background-color: #007eff;" class="text-light">
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre completo</th>
                        <th>Área</th>
                        <th>Sede</th>
                        <th>Fecha de actualización</th>
                        <th>Acciones</th>
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
                            <a class="btn btn-outline-secondary btn-sm" href="/employees/{{ $Employee->id }}/edit"><i class="fa-solid fa-pen-to-square"></i></a>

                            @can('employees.delete')
                            <a class="btn btn-outline-danger btn-sm" href="/employees/{{ $Employee->id }}/confirmdelete"><i class="fa-solid fa-circle-minus"></i></a>
                            @endcan

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
        $("#tableemployee").DataTable({
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