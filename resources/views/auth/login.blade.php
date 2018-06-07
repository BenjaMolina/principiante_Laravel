@extends('layout')

@section('content')
    <h1>LOGIN</h1>
    <form method="POST" action"{{route('login')}}">
        {!! csrf_field() !!} <!--se usa para el token-->
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Entrar">
    </form>
    <br>
@stop