@extends('layout')

@section('content')
    <h1>Crear nuevo Usuario</h1>

    <form action="{{route('usuarios.store')}}" method="POST">
        
        @include('users.form',['user'=> new \App\User])       
                
        <input class="btn btn-primary" type="submit" value="Guardar">
    </form>

@stop