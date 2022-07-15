@extends('Shared.base')

@section('content')
<div class="mt-2"></div>
<div class="container">
    @can('reports.index')
        <a class="btn mt-3 mb-3 text-light btn-sm" style="background-color: orange" href="{{ route('export') }}"><i class="fa-solid fa-download"></i> Exportar</a>
    @endcan
    @can('reports.indexAll')
        <a class="btn mt-3 mb-3 text-light btn-sm btn-secondary" href="{{ route('exportAll') }}"><i class="fa-solid fa-download"></i> Exportar Todos los registros</a>
    @endcan
    @can('reports.indexAll')
        <a class="btn mt-3 mb-3 text-light btn-primary btn-sm" href="{{ route('indexAll') }}"></i>
        <i class="fa-solid fa-eye"></i>Todos los reportes</a>
    @endcan
    @if( isset($Message) )
        <li class="alert alert-success">{{ $Message }}</li>
    @endif
    
</div>
<div class="container">
    <table id="tableregister" class="table table-striped text-center table-borderless cell-border">
        <thead>
            <th colspan="12" class="text-center">
                <h5><i class="fa-solid fa-calendar-check mt-2"></i><strong> Reporte registrado por colaborador</strong></h5>
            </th>
            <tr>
                <th class="text-center">Cédula</th>
                <th class="text-center">Nombre completo</th>
                <th class="text-center">Área</th>
                <th class="text-center">Sede</th>
                <th class="text-center">Correo electrónico</th>
                <th class="text-center">Registro de ingreso</th>
                <th class="text-center">Registro de salida</th>
            </tr>
        </thead>

        <tbody>
            @foreach( $Reports as $Report )
            <tr>
                <td> {{ $Report->identification }} </td>
                <td> {{ $Report->fullname }} </td>
                <td> {{ $Report->area }} </td>
                <td> {{ $Report->site }} </td>
                <td> {{ $Report->email }} </td>
                <td> {{ $Report->created_at }} </td>
                <td> {{ $Report->updated_at }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#tableregister').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>

@endsection