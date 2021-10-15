@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <a href="{{route('usuarios.blog.index')}}" class="btn btn-primary">Regresar</a>
    </div>
</div>

<article class="contenido-receta bg-white p-5 shadow">
    <h1 class="text-center mb-4">{{$blog->titulo}}</h1>



    <div class="imagen-blog">
       {{-- <img src="/storage/{{ $blog->imagen }}" class="w-100">--}}
       <img src="{{ $blog->imagen }}" class="w-100">
    </div>

    <div class="blog-meta mt-3">

        <p>
            <span class="font-weight-bold text-primary">Autor:</span>
            <a class="text-dark" href=" {{route('usuarios.perfil.show', ['perfil' => $blog->autorBlog->id ])}}">
                {{$blog->autorBlog->name}}
            </a>

        </p>

        
        <p>
            <span class="font-weight-bold text-primary">Fecha:</span>
            @php
                $fecha = $blog->created_at
            @endphp

            <fecha-receta fecha="{{$fecha}}" ></fecha-receta>
        </p>

        {{--<p>
            <span class="font-weight-bold text-primary">Fecha:</span>
            @php
                $fecha = $rutina->created_at
            @endphp

            <fecha-receta fecha="{{$fecha}}" ></fecha-receta>
        </p>--}}



        <div class="Descripcion">
            <h2 class="my-3 text-primary">Descripcion de la rutina</h2>

            {!! $blog->descripcion !!}
        </div>





    </div>
</article>
    
@endsection