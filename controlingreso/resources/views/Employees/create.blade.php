@extends('Shared.base')

@section('content')
<div class="mt-5">

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
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa-solid fa-circle-plus"></i> Nuevo Colaborador</h3>
                    </div>
                    <form action="/employees" method="POST" class="container">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="number" name="identification" id="identification" class="form-control" placeholder="Identificación" value="{{ old('identification') }}" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nombre completo" value="{{ old('fullname') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="area" id="area" class="form-control" placeholder="Área" value="{{ old('area') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="site" id="site" class="form-control" placeholder="Sede" value="{{ old('site') }}">
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                            <a class="btn btn-secondary" href="/employees"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection