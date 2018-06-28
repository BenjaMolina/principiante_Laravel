@extends('layout')

@section('content')
    <h1>Editar Contenido</h1>

    @if(session()->has('info'))
        <div class="alert alert-success">{{session('info')}}</div>
    @endif

    <form action="{{route('usuarios.update',$user->id)}}" method="POST">
        {!! method_field('PUT') !!} <!--para poder hacer uso de PUT-->
        
        @include('users.form')       
                
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
@stop