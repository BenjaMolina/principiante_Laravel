@extends('layout')

@section('content')
    <h1>Saludos para <?php echo $nombre ?></h1>
    <h1>Saludos para {{ $nombre }}</h1> <!-- Con Blade -->
    {!! $html !!}

    <ul>
        @foreach ($consolas as $consola)
            <li>{{ $consola }}</li>
        @endforeach
    </ul>

    <ul>
        @forelse ($consolas as $consola)
            <li>{{ $consola }}</li>
        @empty
            <p>No hay datos :(</p>
        @endforelse
    </ul>

    <!--Condicionales-->
    @if(count($consolas) === 1)
        <p>Tienes una consola</p>
    
    @elseif(count($consolas) > 1)
        <p>Tienes varias consolas</p>
    @else
        <p>No tienes consolas</p>

    @endif
    
@stop
