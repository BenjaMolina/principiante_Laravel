@extends('layout')

@section('content')
    <h1>Editar Contenido</h1>

    @if(session()->has('info'))
        <div class="alert alert-success">{{session('info')}}</div>
    @endif

    <form action="{{route('usuarios.update',$user->id)}}" method="POST">
        {!! method_field('PUT') !!} <!--para poder hacer uso de PUT-->
        {!! csrf_field() !!}

        <p><label for="nombre">
            Nombre:
            <input  class="form-control" type="text" name="name" value="{{ $user->name }}">
            {!! $errors->first('name','<span class="error">:message</span>') !!}
        </label></p>
        <p><label for="email">
            Email:
            <input  class="form-control" type="text" name="email" value="{{$user->email}}">
            {!! $errors->first('email','<span class="error">:message</span>') !!}
        </label></p>
                
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
@stop