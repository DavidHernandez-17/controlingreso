@extends('Shared.base')

@section('content')
<div class=" text-center mt-5">
    <div>
        <h4><i class="fa-solid fa-upload mb-3"></i> Importar archivo</h4>
    </div>  

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/employees/import/excel" method="POST" class="container" enctype="multipart/form-data">
        @csrf       
        <input type="file" class="form-control" name="import_file">

        <div>
            <button type="submit" class="btn btn-outline-success mt-3"><i class="fa-solid fa-upload"></i> Importar</button>
            <a class="btn btn-outline-secondary mt-3" href="/employees"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
        </div>

    </form>
</div>
<div class="container mt-5 card" style=" border-top: solid 6px; border-top-color: #3393FF;">
    <div class="row">
        <div class="col-6 col-sm-4 text-center mt-3">
            <h4><i class="fa-solid fa-circle-info text-primary"></i></h4>
            <h5> Recomendaciones para importar colaboradores</h5> 
        </div>
        <div class="col-6 col-sm-4 mt-3">
            <ol>
                <li>
                    No ingreses números de identificación duplicados
                    <i class="fa-solid fa-triangle-exclamation"></i>                
                </li>
                <li>
                    El archivo que importes debe ser de tipo Excel
                    <i class="fa-solid fa-file-excel"></i>
                </li>
            </ol>
        </div>
        <div class="col-6 col-sm-4 mt-3">
            <ol start="3">
                <li>
                    No importes colaboradores ya existentes en nuestra base de datos
                    <i class="fa-solid fa-database"></i>
                </li>
                <li>
                    A continuación te mostramos la estructura que debe tener tu archivo excel para la importación:
                </li>
            </ol>
        </div>
    </div>
</div>

<div class="container mt-3 text-center">
    <h5>--- Acá irá una imagen ---</h5>
</div>

@endsection