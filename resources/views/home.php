<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Home</h1>
    <a href="<?php echo route('home'); ?>">Inicio</a>
    <a href="<?php echo route('saludos','YOMerengues'); ?>">Saludo</a> <!-- MAndando parametro opcional -->
    <a href="<?php echo route('contactos'); ?>">Contacto</a>
</body>
</html>