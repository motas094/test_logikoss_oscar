@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuarios<a class="float-right btn btn-primary" href="{{ route('usuario.nuevoUsuario') }}">Nuevo Usuario</a></div>
                    <div class="card-body">
                        @if(count($usuarios) > 0)
                            <div class="table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Acciones</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Avatar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $usuario)
                                            <tr>
                                                <td scope="col"><a href="{{ route('usuario.editarUsuario',$usuario->id) }}">Editar</a> | <a href="{{ route('usuario.eliminarUsuario',$usuario->id) }}">Eliminar</a></td>
                                                <td scope="col">{{ $usuario->id }}</td>
                                                <td scope="col">{{ $usuario->name }}</td>
                                                <td scope="col">{{ $usuario->email }}</td>
                                                <td scope="col">{{ $usuario->username }}</td>
                                                <td scope="col"><img src="{{ url('storage/app/avatars/'.$usuario->username.'.png') }}" style="width: 100%; height: 100%;">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $usuarios->links() }}
                        @else
                            <p><em>Sin resultados de usuarios</em></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
