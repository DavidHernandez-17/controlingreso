@extends('Shared.base')

@section('content')
<div class="mt-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa-solid fa-pen-to-square"></i> Editar Colaborador</h3>
                    </div>

                    @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

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
                                <input type="text" name="fullname" id="fullname" class="form-control" value="{{ $Employee->fullname }}" value="{{ old('fullname') }}">
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Área</label>
                                <input type="text" name="area" id="area" class="form-control" value="{{ $Employee->area }}" value="{{ old('area') }}">
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Sede</label>
                                <input type="text" name="site" id="site" class="form-control" value="{{ $Employee->site }}" value="{{ old('site') }}">
                            </div>
                            @can('only.user')
                            <div class="form-group">
                                <label class="text-primary">Correo electrónico</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $Employee->email }}" value="{{ old('email') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Apodo</label>
                                <input type="text" name="nickname" id="nickname" class="form-control" value="{{ $Employee->nickname }}" value="{{ old('nickname') }}" readonly>
                            </div>
                            @endcan
                            @can('employees.edit')
                            <div class="form-group">
                                <label class="text-primary">Correo electrónico</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $Employee->email }}" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Apodo</label>
                                <input type="text" name="nickname" id="nickname" class="form-control" value="{{ $Employee->nickname }}" value="{{ old('nickname') }}">
                            </div>
                            @endcan

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