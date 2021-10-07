@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <a href="{{route('usuarios.rutinas.index')}}" class="btn btn-primary">Regresar</a>
    </div>
</div>

<article class="contenido-receta bg-white p-5 shadow">
    <h1 class="text-center mb-4">{{$rutina->titulo}}</h1>

    <div class="imagen-receta">
        <img src="/storage/{{ $rutina->imagen }}" class="w-100">
    </div>

    <div class="receta-meta mt-3">
        <p>
            <span class="font-weight-bold text-primary">Escrito en:</span>
            <a class="text-dark" href=" ">
                {{$rutina->categoria->nombre}}
            </a>

        </p>

        <p>
            <span class="font-weight-bold text-primary">Autor:</span>
            <a class="text-dark" href=" {{route('usuarios.perfil.show', ['perfil' => $rutina->autor->id ])}}">
                {{$rutina->autor->name}}
            </a>

        </p>

        <p>
            <span class="font-weight-bold text-primary">Fecha:</span>
            @php
                $fecha = $rutina->created_at
            @endphp

            <fecha-receta fecha="{{$fecha}}" ></fecha-receta>
        </p>



        <div class="Descripcion">
            <h2 class="my-3 text-primary">Descripcion de la rutina</h2>

            {!! $rutina->descripcion !!}
        </div>


        <div class="Video">
            <h2 class="my-3 text-primary">Video de la rutina</h2>
        </div>

        <div class="embed-responsive embed-responsive-16by9">
            <iframe src="{{$rutina->url}}" frameborder="0"></iframe>
        </div>

        <div class="justify-content-center row text-center">
            <like-button
                rutina-id="{{$rutina->id}}" like="{{$like}}" likes="{{$likes}}"
                
            ></like-button>
        </div>





    </div>
</article>

    
@endsection