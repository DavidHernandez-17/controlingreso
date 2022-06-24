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
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa-solid fa-pen-to-square"></i> Editar Colaborador</h3>
                    </div>
                    <form action="/employees/{{ $Employee->id }}" method="POST" class="container">
                        @csrf
                        @method('PUT')
                        <div class="card-body">                        
                            <div class="form-group">
                                <label class="text-primary">Identificación</label>
                                <input type="number" readonly name="identification" id="identification" class="form-control" value="{{ $Employee->identification }}" value="{{ old('identification') }}">
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Nombre completo</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" value="{{ $Employee->fullname }}" value="{{ old('fullname') }}" autofocus>
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Área</label>
                                <input type="text" name="area" id="area" class="form-control" value="{{ $Employee->area }}" value="{{ old('area') }}">
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Sede</label>
                                <input type="text" name="site" id="site" class="form-control" value="{{ $Employee->site }}" value="{{ old('site') }}">
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