@extends('Shared.base')

@section('content')
<div class="container">
<h4 class="text-center"><i class="fa-solid fa-calendar-check mt-4 text-secondary"></i> Reporte registrado por usuario</h4>
    <table id="tableregister" class="text-center cell-border">
        <thead>
            <tr>
                <th class="text-center">Cédula</th>
                <th class="text-center">Nombre completo</th>
                <th class="text-center">Área</th>
                <th class="text-center">Sede</th>
                <th class="text-center">Fecha y hora de ingreso</th>
            </tr>
        </thead>

    <tbody>
        @foreach( $Reports as $Report )
        <tr>
            <td> {{ $Report->identification }} </td>
            <td> {{ $Report->fullname }} </td>
            <td> {{ $Report->area }} </td>
            <td> {{ $Report->site }} </td>
            <td> {{ $Report->created_at }} </td>
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