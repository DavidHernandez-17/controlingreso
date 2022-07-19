<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/Images/LogoA.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/nav_style.css') }}">

    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <title>Control de Ingreso</title>
</head>

<body class="hold-transition layout-top-nav bg-light sidebar-mini">

    @if( Auth::check() )
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container-fluid">
                <div>
                    <img src="{{ asset('assets/Images/logo.png') }}" class="brand-image" width="auto">
                    <small><i class="fa-solid fa-wifi text-primary"></i></small>
                    <a href="{{ route('reports') }}"><span class="brand-text text-primary font-weight-light"><small> {{ Auth::user()->area }}</small></span></a>
                </div>

                <div class="justify-text-left">
                    <div class="collapse navbar-collapse nav float-center" id="navbar">
                        <div class="navbar-nav ">

                            @can('register.index')
                            <div class="dropdown">
                                @if( Route::currentRouteName() == "register" 
                                    || Route::currentRouteName() == "users"
                                    || Route::currentRouteName() == "users-create"
                                    || Route::currentRouteName() == "users-edit"
                                    || Route::currentRouteName() == "edit_password"
                                    || Route::currentRouteName() == "confirmdelete" )
                                <a class="dropdown-toggle nav-link nav_active" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i> Administración
                                </a>
                                @else
                                <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-gear"></i> Administración
                                </a>
                                @endif
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="/register"><i class="fa-solid fa-id-card"></i> Registro</a></li>
                                    <li><a class="dropdown-item" href="/users"><i class="fa-solid fa-user-check"></i> Usuarios</a></li>
                                    <li><a class="dropdown-item disabled" href="#"><i class="fa-solid fa-calendar-days"></i> Control asistencia</a></li>
                                    <li><a class="dropdown-item disabled" href="#"><i class="fa-solid fa-person-circle-question"></i> Registro invitados</a></li>
                                </ul>
                            </div>

                            @endcan
                            
                            @if( Route::currentRouteName() == "employees"
                                || Route::currentRouteName() == "employees-create" 
                                || Route::currentRouteName() == "employees-edit"
                                || Route::currentRouteName() == "employee-confirmdelete"
                                || Route::currentRouteName() == "employee-import"
                                || Route::currentRouteName() == "import_excel")
                                <a class="nav-link text-secondary nav_active" href="/employees"><i class="fa-solid fa-user-gear"></i> Colaboradores</a>
                            @else
                                <a class="nav-link text-secondary" href="/employees"><i class="fa-solid fa-user-gear"></i> Colaboradores</a>
                            @endif
                            
                            @if( Route::currentRouteName() == "reports"
                                || Route::currentRouteName() == "reports-all")
                                <a class="nav-link text-secondary nav_active" href="/reports"><i class="fa-solid fa-calendar-check"></i> Reportes</a>
                            @else
                                <a class="nav-link text-secondary" href="/reports"><i class="fa-solid fa-calendar-check"></i> Reportes</a>
                            @endif

                            <div class="dropdown">
                                <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-circle-user"></i> Hola, {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item btn btn-ou-dark" href="{{ route('logout') }}">Cerrar sesión</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </nav>
    </div>
    @endif

    <div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>


<!--
<div class="card">
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
-->

</html>