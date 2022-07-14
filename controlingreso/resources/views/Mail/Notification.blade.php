<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Notificación | Control de ingreso</title>
</head>

<body style="background-color: black ">

    <!--Copia desde aquí-->
    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
        <tr>
            <td style="background-color: #ecf0f1">
                <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                    <img class="img-fluid" style="display:block" width="130" src="{{ asset('assets/Images/LogoA.png') }}">
                    <h2 style="color: #e67e22; margin: 0 0 7px">Hola {{ $reports->nickname }} !!</h2>
                    <p style="margin: 2px; font-size: 15px">
                        Tienes una nueva notificación de acceso, te dejaremos los datos a continuación, que tengas un excelente día.
                    </p>
                    <p>
                        Recuerda que si necesitas un reporte más completo lo puedes solicitar desde nuestra mesa de ayuda (Botón azul).
                    </p>
                    <div>
                        <ul style="font-size: 15px;">
                            <li>Identificación: {{ $reports->identification }}</li>
                            <li>Área: {{ $reports->area }}</li>
                            <li>Sede: {{ $reports->site }}</li>
                            <li>Fecha y hora de ingreso: {{ $reports->created_at }}</li>
                        </ul>
                    </div>
                
                    <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
                        <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db" href="http://10.1.1.106/itop/pages/UI.php">Requerimiento TIC</a>
                    </div>

                    <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Creado por TIC AA (Y.D)</p>
                    <p style="color: #b3b3b3; font-size: 12px; text-align: center;">Alberto  Álvarez  S  S.A</p>
                </div>
            </td>
        </tr>
    </table>
    <!--hasta aquí-->

</body>

</html>