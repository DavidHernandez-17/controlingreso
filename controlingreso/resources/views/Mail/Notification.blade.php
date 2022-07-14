<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificación control de ingreso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>
<body>
    <h4><i class="fa-solid fa-envelope-circle-check"></i> Notificación - Control de ingreso AA</h4>
    <p>Hola {{ $reports->nickname }} !!</p>
    <p>Tienes una nueva notificación de acceso, te dejaremos los datos a continuación, que tengas un excelente día.</p>
    <ul>
        <li>Identificación: {{ $reports->identification }}</li>
        <li>Área: {{ $reports->area }}</li>
        <li>Sede: {{ $reports->site }}</li>
        <li>Fecha y hora de ingreso: {{ $reports->created_at }}</li>
    </ul>
    <p>-- Alberto Álvarez S S.A --</p>
</body>
</html>