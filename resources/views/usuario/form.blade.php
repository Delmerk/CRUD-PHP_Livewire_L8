@extends('layouts.app')
@section('content')
<div class="container">
    <h2>{{$modo}} usuario.</h2>

    @if (count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        
    @endif
<div class="row">
        <div class="col">
            <label for="Nombre">Nombre: </label>
            <input type="text" name="Nombre" value="{{ isset($usuario->Nombre)?$usuario->Nombre:old('Nombre') }}"  class="form-control">
        </div>
        
        <div class="col">
            <label for="Apellidos">Apellidos: </label>
            <input type="text" name="Apellidos" value="{{ isset($usuario->Apellidos)?$usuario->Apellidos:old('Apellidos') }}" class="form-control">
        </div>
</div>
<div class="row">
        <div class="col">
            <label for="Documento">Documento: </label>
            <input type="text" name="Documento" value="{{ isset($usuario->Documento)?$usuario->Documento:old('Documento') }}" class="form-control">
        </div>
        
        <div class="col">
            <label for="Codigo">Codigo: </label>
            <input type="text" name="Codigo" value="{{ isset($usuario->Codigo)?$usuario->Codigo:old('Codigo') }}" class="form-control">
        </div>

        <div class="col">
            <label for="Nacimiento">Nacimiento: </label>
            <input type="date" name="Nacimiento" value="{{ isset($usuario->Nacimiento)?$usuario->Nacimiento:old('Nacimiento') }}" class="form-control">
        </div>
</div> 
<div class="container">
    <a href="{{ url('/usuario') }}" class="btn btn-primary">Regresar</a>

    <input style="margin:2% " type="submit" value="{{$modo}} Datos" class="btn btn-success">    
    </div>
</div>  
@endsection