@extends('Shared.base')

@section('content')
<div class="mt-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa-solid fa-circle-plus"></i> Nuevo usuario</h3>
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

                    <form action="/users" method="POST" class="container">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre completo" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <select name="role_id" id="role" class="form-control" required>
                                    <option value="">-- Selecciona un rol --</option>
                                    @foreach( $Roles as $Role )
                                        <option value="{{ $Role->id }}">{{ $Role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                            <a class="btn btn-secondary" href="/users"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection