<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi sitio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .active{
            text-decoration: none;
            color:green;
        }
        .error{
            color:red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <header>
        <!--<h1>{{ request()->url()  }}</h1>
        <h2>{{ request()->is('/') ? 'Estas en el Home' : 'No estas en el home' }}</h2>-->
        
        <?php 
            function activateMenu($url)
            {
                return request()->is($url) ? 'active' : '' ;
            }
        ?>
        <nav>
             <a class=" {{ activateMenu('/') }}" 
                href="{{ route('home') }}">
                Inicio
            </a>
            <a class=" {{ activateMenu('saludos/*') }}"  
                href="{{  route('saludos', 'YOMerengues') }}">
                Saludo
            </a> <!-- MAndando parametro opcional -->
            <a class=" {{ activateMenu('mensajes/create') }}"  
                href="{{  route('messages.create') }}">
                Contacto
            <a class=" {{ activateMenu('mensajes') }}"  
                href="{{  route('messages.index') }}">
                Mensajes
            </a>
        </nav>
    </header>

    @yield('content') <!-- section para que vaya el contenido de las otras plantillas-->

    <footer>
        Copiright {{date('Y')}}
    </footer>
</body>
</html>