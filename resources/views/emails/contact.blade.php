<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensaje Recibido</title>
</head>
<body>
    <h1>Te responderemos a la brevedad Posible</h1>
    <p>
        Nombre: {{ $msg->nombre }} <br>
        Email: {{ $msg->email }} <br>
        Mensaje: {{ $msg->mensaje }} <br>

    </p>
</body>
</html>