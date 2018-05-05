    @extends('layout')

    @section('content')
        <h1>CONTACTOS</h1>
        <h2>Escribenos</h2>
        @if(session()->has('keyMensaje'))
        
            <h3>{{ session('keyMensaje')}}</h3>
        
        @else
        <form action="contacto" method="post">
            <p><label for="nombre">
                Nombre:
                <input type="text" name="nombre" value="{{ old('nombre') }}">
                {!! $errors->first('nombre','<span class="error">:message</span>') !!}
            </label></p>
            <p><label for="email">
                Email:
                <input type="text" name="email" value="{{old('email')}}">
                {!! $errors->first('email','<span class="error">:message</span>') !!}
            </label></p>
            <p><label for="mensaje">
                Mensaje:
                <textarea name="mensaje"> {{old('mensaje')}}</textarea>
                {!! $errors->first('mensaje','<span class="error">:message</span>') !!}
            </label></p>
            
            <input type="submit" value="Enviar">
        </form>
        <hr>
        @endif
        
    @stop