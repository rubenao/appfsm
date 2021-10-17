@extends('layouts.app')


@section('content')

<h1 class="text-center">Panel de administracion de rutinas</h1>

<div class="container">
    <div class="row">
        <a href="{{route('usuarios.rutinas.create')}}" class="btn btn-primary mx-2">Crear rutina</a>
        <a href="{{route('usuarios.perfil.edit', ['perfil' =>Auth::user()->id])}}" class="btn btn-primary mx-2">Editar perfil</a>


    </div>
</div>





<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Titulo</th>
                <th scole="col">Categoría</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($rutinas as $rutina)
                <tr>
                    <td> {{$rutina->titulo}} </td>
                    <td> {{$rutina->categoria->nombre}} </td>
                    <td>

                        <eliminar rutina-slug={{$rutina->slug}}>


                        </eliminar>

                        <a href="{{route('usuarios.rutinas.edit', ['rutina'=> $rutina ->slug])}}" class="btn btn-dark d-block mb-2" >Editar</a>
                        <a href="{{route('usuarios.rutinas.show', ['rutina'=> $rutina ->slug])}}" class="btn btn-success d-block mb-2">Ver</a>
                        

                        
                    </td>
                </tr>
            @endforeach
        </tbody>

        
    </table>


    <h2 class="text-center my-5">Rutinas que te gustaron</h2>
        <div class="col-md-10 mx-auto bg-white p-3">

            @if ( count( $usuario->meGusta ) > 0 )
                <ul class="list-group">
                    @foreach( $usuario->meGusta as $rutina )
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <p> {{$rutina->titulo}}</p>

                            <a class="btn btn-outline-success text-uppercase font-weight-bold" href="{{ route('usuarios.rutinas.show', ['rutina' => $rutina->id ])}}">Ver</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center">Aún no tienes rutinas Guardadas
                    <small> Dale me gusta a las rutinas y aparecerán aquí</small>
                </p>

            @endif
        </div>


    
@endsection