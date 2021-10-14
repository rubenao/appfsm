@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <a href="{{route('usuarios.recetas.index')}}" class="btn btn-primary">Regresar</a>
    </div>
</div>

<article class="contenido-receta bg-white p-5 shadow">
    <h1 class="text-center mb-4">{{$receta->titulo}}</h1>



    <div class="imagen-receta">
       {{-- <img src="/storage/{{ $receta->imagen }}" class="w-100">--}}
       <img src="{{ $receta->imagen }}" class="w-100">
    </div>

    <div class="receta-meta mt-3">

        <p>
            <span class="font-weight-bold text-primary">Autor:</span>
            <a class="text-dark" href=" {{route('usuarios.perfil.show', ['perfil' => $receta->autorReceta->id ])}}">
                {{$receta->autorReceta->name}}
            </a>

        </p>

        {{--<p>
            <span class="font-weight-bold text-primary">Fecha:</span>
            @php
                $fecha = $rutina->created_at
            @endphp

            <fecha-receta fecha="{{$fecha}}" ></fecha-receta>
        </p>--}}



        <div class="Descripcion">
            <h2 class="my-3 text-primary">Ingredientes</h2>

            {!! $receta->ingredientes !!}
        </div>

        <div class="Descripcion">
            <h2 class="my-3 text-primary">Preparacion</h2>

            {!! $receta->preparacion !!}
        </div>





    </div>
</article>



    
@endsection