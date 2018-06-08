@extends('layout')

@section('content')
    <h1>LOGIN</h1>
    <form class="form-inline" method="POST" action"{{route('login')}}">
        {!! csrf_field() !!} <!--se usa para el token-->
        <input class="form-control" type="email" name="email" placeholder="Email">
        <input class="form-control" type="password" name="password" placeholder="password">
        <input class="btn btn-primary" type="submit" value="Entrar">
    </form>
    <br>
@stop