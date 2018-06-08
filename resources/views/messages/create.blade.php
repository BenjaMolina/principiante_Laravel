@extends('layout')

@section('content')
    <h1>CONTACTOS</h1>
    <h2>Escribenos</h2>
    @if(session()->has('keyMensaje'))
    
        <h3>{{ session('keyMensaje')}}</h3>
    
    @else
    <form action="{{route('mensajes.store')}}" method="POST">
        <p><label for="nombre">
            Nombre:
            <input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
            {!! $errors->first('nombre','<span class="error">:message</span>') !!}
        </label></p>
        <p><label for="email">
            Email:
            <input class="form-control" type="text" name="email" value="{{old('email')}}">
            {!! $errors->first('email','<span class="error">:message</span>') !!}
        </label></p>
        <p><label for="mensaje">
            Mensaje:
            <textarea class="form-control" name="mensaje"> {{old('mensaje')}}</textarea>
            {!! $errors->first('mensaje','<span class="error">:message</span>') !!}
        </label></p>
        
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
    <hr>
    @endif
    
@stop