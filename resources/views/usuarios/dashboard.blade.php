@extends('layouts.app')


@section('content')

    
    <h2 class="text-center">Bienvenido: {{$usuario->name}}</h2>

    <a href="{{route('usuarios.rutinas.create')}}" class="btn btn-primary ml-5">Crear rutina</a>

    <a href="{{route('usuarios.blog.create')}}" class="btn btn-success ml-5">Crear blog</a>


    
    
    
@endsection