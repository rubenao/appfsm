@extends('layouts.app')


@section('content')

<h1 class="text-center">Panel de administracion de entradas</h1>

<div class="container">
    <div class="row">
        <a href="{{route('usuarios.blog.create')}}" class="btn btn-primary mx-2">Crear entrada</a>
        <a href="{{route('usuarios.perfil.edit', ['perfil' =>Auth::user()->id])}}" class="btn btn-primary mx-2">Editar perfil</a>


    </div>
</div>

<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Titulo de la entrada</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($entradas as $entrada)
                <tr>
                    <td> {{$entrada->titulo}} </td>
                    <td>

                        <a href="{{route('usuarios.blog.edit', ['blog'=> $entrada -> id])}}" class="btn btn-dark w-100 mb-2" >Editar</a>
                        <a href="{{route('usuarios.blog.show', ['blog'=> $entrada -> id])}}" class="btn btn-success w-100 mb-2">Ver</a>
                        <a href="{{route('usuarios.blog.destroy', ['blog'=> $entrada -> id])}}" class="btn btn-danger w-100 mb-2">Eliminar</a>

                        
                    </td>
                </tr>
            @endforeach
        </tbody>

        
    </table>
    
@endsection