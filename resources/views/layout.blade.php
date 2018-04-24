<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi sitio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <nav>
             <a href="<?php echo route('home'); ?>">Inicio</a>
            <a href="<?php echo route('saludos', 'YOMerengues'); ?>">Saludo</a> <!-- MAndando parametro opcional -->
            <a href="<?php echo route('contactos'); ?>">Contacto</a>
        </nav>
    </header>

    @yield('content') <!-- section para que vaya el contenido de las otras plantillas-->

    <footer>
        Copiright {{date('Y')}}
    </footer>
</body>
</html>