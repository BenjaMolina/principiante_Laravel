@extends('layout')

@section('content')
    <h1>Todos los mensajes</h1>
    <table class="table">
        <thead>                
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Notas</th>
                <th>Tags</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td> {{$message->id}} </td>
                    
                    @if($message->user_id)
                        <td>
                            <a href="{{route('usuarios.show',$message->user_id)}}">
                                {{$message->user->name}}
                            </a>
                        </td>
                        <td>{{$message->user->email}}</td>
                    @else
                        <td> {{$message->nombre}} </td>
                        <td> {{$message->email}} </td>
                    @endif
                    <td> 
                        <a href="{{route('mensajes.show', $message->id )}}"> 
                            {{$message->mensaje}} 
                        </a>
                        
                    </td>
                    <td>{{ $message->note ? $message->note->body : "" }}</td>
                    <td>{{ $message->tags ? $message->tags->pluck('name')->implode(', ') : "" }}</td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{route('mensajes.edit',$message->id)}}">
                            Editar
                        </a>
                        <form style="display:inline" method="POST" action="{{route('mensajes.destroy',$message->id)}}">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $messages
        ->fragment('hash') //#hash
        ->appends(request()->query())//Parametros &osorted=asc
        ->render("pagination::simple-default") !!}

    {!! $messages
        ->fragment('hash') //#hash
        ->appends(request()->query())//Parametros &osorted=asc
        ->links("pagination::default") !!}
@stop