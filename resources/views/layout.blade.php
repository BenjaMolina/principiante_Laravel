<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi sitio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/app.css">
    
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
        
        
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Title</a>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class=" {{ activateMenu('/') }}">
                            <a 
                                href="{{ route('home') }}">
                                Inicio
                            </a>
                        </li>
                        <li class=" {{ activateMenu('saludos/*') }}">
                            <a 
                                href="{{  route('saludos', 'YOMerengues') }}">
                                Saludo
                            </a> <!-- MAndando parametro opcional -->
                        </li>
                        <li class=" {{ activateMenu('mensajes/create') }}" >
                            <a 
                                href="{{  route('mensajes.create') }}">
                                Contacto
                            </a>
                        </li>
                    
                        
                        @if(auth()->check())
                            <li class=" {{ activateMenu('mensajes*') }}">
                                <a   
                                    href="{{  route('mensajes.index') }}">
                                    Mensajes
                                </a>
                            </li>
                            
                        @endif
                        
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        @if(auth()->guest())
                            <li class=" {{ activateMenu('login') }}">
                                <a   
                                    href="{{route('login')}}">
                                    login
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="/logout">Cerrar sesion de {{auth()->user()->name}}</a>
                            </li>
                        @endif
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </header>
    
    <div class="container">
        @yield('content') <!-- section para que vaya el contenido de las otras plantillas-->

        <footer>
            Copiright {{date('Y')}}
        </footer>
    </div>
    
</body>
</html>