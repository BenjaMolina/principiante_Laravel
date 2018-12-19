@extends('layout')

@section('content')
    <h1>Usuarios</h1>
    
    <a class="btn btn-success pull-right" href="{{route('usuarios.create')}}">Crear nuevo Usuario</a>
    
    <table class="table">
        <thead>                
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Role</th>
                <th>Notas</th>
                <th>Tags</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td> {{$user->id}} </td>
                    <td>
                        <a href="{{route('usuarios.show', $user->id )}}"> 
                             {{$user->name}} 
                        </a>
                    </td>
                    <td> {{$user->email}} </td>
                    <td>
                        {{$user->roles->pluck('display_name')->implode(', ')}}
                    </td>
                    <td>{{ $user->note ? $user->note->body : "" }}</td>
                    <td>{{ $user->tags ? $user->tags->pluck('name')->implode(', ') : "" }}</td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{route('usuarios.edit',$user->id)}}">
                            Editar
                        </a>
                        <form style="display:inline" method="POST" action="{{route('usuarios.destroy',$user->id)}}">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop