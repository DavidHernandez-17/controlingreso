<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">

    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <title>Control de Ingreso</title>
</head>

<body>

    @if( Auth::check() )
    <div>
        <nav class="navbar navbar-expand-sm bg-primary p-2 text-dark bg-opacity-25">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand" href="#">Control de ingreso</a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <center>
                    <div class="collapse navbar-collapse nav" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" href="/register"><i class="fa-solid fa-id-card"></i> Registro</a>
                            <a class="nav-link active" href="/employees"><i class="fa-solid fa-user-gear"></i> Colaboradores</a>
                            <a class="nav-link active" href="/reports"><i class="fa-solid fa-calendar-check"></i> Reportes</a>
                            <a class="nav-link active" href="/auth/login"> Login</a>
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

</body>

</html>