@extends('layouts.app')


@section('content')

<h1 class="text-center">Panel de administracion de recetas</h1>

<div class="container">
    <div class="row">
        <a href="{{route('usuarios.recetas.create')}}" class="btn btn-primary mx-2">Crear receta</a>
        <a href="{{route('usuarios.perfil.edit', ['perfil' =>Auth::user()->id])}}" class="btn btn-primary mx-2">Editar perfil</a>


    </div>
</div>

<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Titulo de la receta</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($recetas as $receta)
                <tr>
                    <td> {{$receta->titulo}} </td>
                    <td>

                        <a href="{{route('usuarios.recetas.edit', ['receta'=> $receta -> id])}}" class="btn btn-dark w-100 mb-2" >Editar</a>
                        <a href="{{route('usuarios.recetas.show', ['receta'=> $receta -> id])}}" class="btn btn-success w-100 mb-2">Ver</a>
                        <a href="{{route('usuarios.recetas.destroy', ['receta'=> $receta -> id])}}" class="btn btn-danger w-100 mb-2">Eliminar</a>

                        
                    </td>
                </tr>
            @endforeach
        </tbody>

        
    </table>
    
@endsection