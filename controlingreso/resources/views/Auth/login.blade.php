@extends('Shared.base')

@section('content')
<div id="contenedor_carga">  
</div>
<div class="login-box container">
    <!-- /.login-logo -->    
    <div class="card card-outline card-primary" style="margin-top: 35%">
        <div class="card-header text-center">
            <img class="img-fluid" width="300" src="{{ asset('assets/Images/logo.png') }}">
        </div>
        <div class="card-body">
            <h5 class="text-center">Inicio de sesión</h5>
            
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if( isset($_GET['MessageError']) )
            <div class="alert alert-danger">
                <li>{{ $_GET['MessageError'] }}</li>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Usuario" value="{{ $_GET[ 'request' ] ?? '' }}" >
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
                <a href=" {{ route('forgot-password') }}">¿Has olvidado tu contraseña?</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<script>
    window.onload = function(){
        var contenedor = document.getElementById('contenedor_carga');
        
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
    }
</script>
@endsection