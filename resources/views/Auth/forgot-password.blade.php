@extends('Shared.base')

@section('content')

<body class="hold-transition login-page">
    <center class="mt-5">
        <div class="login-box">
            <div class="login-logo">
                <i class="fa-solid fa-key"></i><br>
                <a>Control de Ingreso</a>
                <h6 class="text-orange">Recuperación de contraseña</h6>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">

                    <p class="login-box-msg">
                        ¿Olvidaste tu contraseña? Aquí puedes recuperar fácilmente una nueva contraseña.
                    </p>

                    @if(session('Confirm'))
                        <li class="alert alert-success">{{ session('Confirm') }}</li>   
                    @endif

                    @if(session('noConfirm'))
                        <li class="alert alert-danger">{{ session('noConfirm') }}</li>
                    @endif 

                    <form action="{{ route('forgot-confirm') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" required/>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Solicitar nueva contraseña
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="{{ route('login') }}">Inicio de sesión</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </center>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>

@endsection