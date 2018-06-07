@extends('layout')

@section('content')
    <h1>Editar Mensaje</h1>
    <form action="{{route('mensajes.update',$message->id)}}" method="POST">
        {!! method_field('PUT') !!} <!--para poder hacer uso de PUT-->
        {!! csrf_field() !!}

        <p><label for="nombre">
            Nombre:
            <input type="text" name="nombre" value="{{ $message->nombre }}">
            {!! $errors->first('nombre','<span class="error">:message</span>') !!}
        </label></p>
        <p><label for="email">
            Email:
            <input type="text" name="email" value="{{$message->email}}">
            {!! $errors->first('email','<span class="error">:message</span>') !!}
        </label></p>
        <p><label for="mensaje">
            Mensaje:
            <textarea name="mensaje"> {{$message->mensaje}}</textarea>
            {!! $errors->first('mensaje','<span class="error">:message</span>') !!}
        </label></p>
        
        <input type="submit" value="Enviar">
    </form>
@stop