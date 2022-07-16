@extends('Shared.base')

@section('content')
<div class="mt-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa-solid fa-pen-to-square"></i> Editar usuario</h3>
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

                    <form action="/users/{{ $User->id }}" method="POST" class="container">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label class="text-primary">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $User->name }}" value="{{ old('identification') }}">
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Correo electrónico</label>
                                <input type="text" readonly name="email" id="email" class="form-control" value="{{ $User->email }}" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Área</label>
                                <input type="text" name="area" id="area" class="form-control" value="{{ $User->area }}" value="{{ old('area') }}">
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Rol</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">-- Selecciona un rol --</option>
                                    @foreach( $Roles as $Role )
                                        <option value="{{ $Role->id }}">{{ $Role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                            <a class="btn text-light" style="background-color: orange" href="/users/{{ $User->id }}/edit/password"><i class="fa-solid fa-key"></i> Cambiar contraseña</a>
                            <a class="btn btn-secondary" href="/users"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection