@extends('layout')

@section('content')
    <h1>CONTACTOS</h1>
    <h2>Escribenos</h2>
    @if(session()->has('keyMensaje'))
    
        <h3>{{ session('keyMensaje')}}</h3>
    
    @else
    <form action="{{route('mensajes.store')}}" method="POST">
        @include('messages.form',[
            'message' => new App\Message,
            'showFields' => auth()->guest(),
        ])
    </form>
    <hr>
    @endif
    
@stop