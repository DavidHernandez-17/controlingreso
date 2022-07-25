@extends('Shared.base')
@section('content')
    <div class="container">
        <!-- Nueva tabla -->

    <div class="container">
        <a class="btn btn-primary mt-3 mb-3 btn-sm" href="/employees/create"><i class="fa-solid fa-circle-plus"></i> Crear QR colaborador</a>
        <a class="btn mt-3 mb-3 text-light btn-sm" style="background-color: orange" href="/employees/import/view"><i class="fa-solid fa-upload"></i> Importar</a>
    </div>

    <div class="card text-center">
        <div class="card-header">
            <h3 class="card-title"><i class="fa-solid fa-qrcode"></i></i><strong> Listado de Qr Colaboradores </strong></h3>
        </div>
        <!--card-header -->
        <div class="card-body">
            <table id="tableemployee" class="table table-bordered  text-center">
                <thead style="background-color: #007eff;" class="text-light">
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre completo</th>
                        <th>Imagen QR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $Employees as $Employee )
                    <tr>
                        <td> {{ $Employee->identification }} </td>
                        <td> {{ $Employee->fullname }} </td>
                        <td>
                            <img src="/storage/img/qrcode/{{$Employee->identification}}.png" style="width: 120px;">
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