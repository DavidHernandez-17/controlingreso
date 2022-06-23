@extends('Shared.base')

@section('content')

<div class="login-box container mt-5">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img class="img-fluid" width="130" src="{{ asset('assets/Images/logo.png') }}">
            <h3>Inicio de sesión</h2>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Control de ingreso Alberto Álvarez S S.A</p>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Usuario">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa-solid fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Recuerdame
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-outline-primary btn-block">Ingresar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="forgot-password.html">¿Has olvidado tu contraseña?</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


@endsection