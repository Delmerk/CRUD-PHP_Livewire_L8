@extends('layouts.app')
<div class="container">
@section('content')

    @if (Session::has('mensaje'))
        <div class="alert alert-success" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <a href="{{ url('usuario/create') }}" class="btn btn-success">Crear nuevo usuario</a>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Codigo</th>
                <th>Nacimiento</th>

                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->Nombre }}</td>
                <td>{{ $usuario->Apellidos }}</td>
                <td>{{ $usuario->Documento }}</td>
                <td>{{ $usuario->Codigo }}</td>
                <td>{{ $usuario->Nacimiento }}</td>
                <td>
                    <a href="{{ url('/usuario/' . $usuario->id . '/edit') }}" class="btn btn-warning">Editar</a>
                    <form action="{{ url('/usuario/' . $usuario->id )}}" method="post">
                        @csrf
                        {{ method_field('DELETE')}}
                        <input type="submit" name="" value="Borrar" onclick="return confirm('¿Desea Borrar?')" class="btn btn-danger"> 
                    </form>
                </td>   
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection