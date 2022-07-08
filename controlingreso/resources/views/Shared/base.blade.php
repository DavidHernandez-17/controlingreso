<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"  href="{{ asset('assets/Images/LogoA.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <title>Control de Ingreso</title>
</head>

<body class="hold-transition layout-top-nav bg-light">

    @if( Auth::check() )
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container-fluid">
                <div>
                    <img src="{{ asset('assets/Images/LogoA.png') }}" alt="AlbertoAlvarez Logo" class="brand-image img-circle elevation-4" style="opacity: .7;" >
                    <span class="brand-text text-secondary font-weight-light">Control de ingreso</span>
                </div>

                <center>
                <div class="collapse navbar-collapse nav float-center" id="navbarNavAltMarkup">
                    <div class="navbar-nav ">
                        @can('register.index')
                            <a class="nav-link active text-secondary" href="/register"><i class="fa-solid fa-id-card"></i> Registro</a>
                            <a class="nav-link active text-secondary" href="/users"><i class="fa-solid fa-user-check"></i> Usuarios</a>
                        @endcan

                        <a class="nav-link active text-secondary" href="/employees"><i class="fa-solid fa-user-gear"></i> Colaboradores</a>
                        <a class="nav-link active text-secondary" href="/reports"><i class="fa-solid fa-calendar-check"></i> Reportes</a>

                        <div class="dropdown">
                            <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user"></i> Hola, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                </center>

            </div>
        </nav>
    </div>
    @endif

    <div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>