@extends('Shared.base')

@section('content')
<div class=" text-center mt-4">

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-orange mt-5">
                    <div class="card-header">
                        <h4 class="card-title text-light"><i class="fa-solid fa-upload"></i> Importar archivo</h4>
                    </div>
                    <form action="/employees/import/excel" method="POST" class="container" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @if( isset($Error))
                                <li class="alert alert-danger">{{ $Error }}</li>
                            @endif
                            <input type="file" class="form-control" name="import_file">

                            <div>
                                <button type="submit" class="btn btn-primary mt-3 btn-sm"><i class="fa-solid fa-upload"></i> Importar</button>
                                <a class="btn btn-secondary btn-sm mt-3" href="/employees"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container mt-4 card" style=" border-top: solid 8px; border-top-color: #3393FF;">
    <div class="row">
        <div class="col-6 col-sm-4 text-center mt-2">
            <h4><i class="fa-solid fa-circle-info text-primary"></i></h4>
            <h4> Recomendaciones para importar colaboradores</h5>
        </div>
        <div class="col-6 col-sm-4 mt-3">
            <ol>
                <li>
                    <h6 class="text-danger">No ingreses números de identificación duplicados <i class="fa-solid fa-triangle-exclamation"></i></h6>
                </li>
                <li>
                    <h6>El archivo que importes debe ser de tipo Excel <i class="fa-solid fa-file-excel"></i></h6>
                </li>
            </ol>
        </div>
        <div class="col-6 col-sm-4 mt-3">
            <ol start="3">
                <li>
                    <h6>Los valores de Área y Sede deben estar en mayúscula <i class="fa-solid fa-database"></i></h6>
                </li>
                <li>
                    <a href="{{ route('download_import') }}" class="text-dark"><i class="fa-solid fa-download"></i> Descargarformato.xlsx</a>
                </li>
            </ol>
        </div>
    </div>
</div>



@endsection