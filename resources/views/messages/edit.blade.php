@extends('layout')

@section('content')
    <h1>Editar Mensaje</h1>
    <form action="{{route('mensajes.update',$message->id)}}" method="POST">
        {!! method_field('PUT') !!} <!--para poder hacer uso de PUT-->
        {!! csrf_field() !!}
        @include('messages.form',['btnText' => 'Actualizar'])
    </form>
@stop