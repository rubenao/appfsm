@extends('layouts.app')


@section('content')

    
    <h2 class="text-center">Bienvenido: {{$usuario->name}}</h2>

    <a href="{{route('usuarios.rutinas.create')}}" class="btn btn-primary ml-5">Crear rutina</a>
    
    
@endsection