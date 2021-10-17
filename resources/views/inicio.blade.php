@extends('layouts.appv2')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
    <!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/min/tiny-slider.helper.ie8.js"></script><![endif]-->
    
@endsection

@section('hero')
    <div class="hero-banner">
        {{--<form class="container h-100" action={{ route('buscar.show') }}>--}}
            <div class="row h-100 align-items-center">
                <div class="col-md-4 contenedor-hero">
                    <p class="caption-hero">No dejes de entrenar</p>
                    <p class="parrafo-hero">Regístrate y ponte en forma</p>

                    <a href="{{route('register')}}" class="btn btn-primary cta-button">Entrenar ahora!</a>
                </div>
            </div>
        {{--</form>--}}
    </div>
@endsection

@section('content')

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria mb-4">
            Ultimas Rutinas
        </h2>
        <div class="my-slider">
            @foreach ($nuevas as $nueva)

            <div class="col-md-4 mt-4">

                <div class="card">
                    <img src="{{$nueva->imagen}}" class="card-img-top "alt="imagen receta">
                    <div class="card-body">
                        <h3 class="text-center">{{$nueva->titulo}}</h3>
                        <p>{{ Str::words(strip_tags( $nueva->descripcion ), 20)}}</p>
                        <a class="btn btn-primary d-block font-weight-light" href="{{route('usuarios.rutinas.show', ['rutina' => $nueva->slug])}}">Ver rutina</a>
                    </div>
                </div>
            </div>         
            @endforeach
        </div>
    </div>

    <div class="container">
        <h2 class="titulo-categoria mt-5 mb-4">Rutinas más votadas</h2>
        <div class="slider">
            
            @foreach($votadas as $rutina)
            <div class="col-md-4 mt-4">
                <div class="card shadow">
                    <img class="card-img-top"src="{{$rutina->imagen}}" alt="imagen receta">
                    <div class="card-body">
                        <h3 class="card-title">{{$rutina->titulo}}</h3>
                        <div class="meta-receta d-flex justify-content-between">
                                    @php
                
                                    $fecha=$rutina->created_at
                                    
                                    @endphp
                
                                    <fecha-receta fecha="{{$fecha}}"></fecha-receta>
                                    <p>{{count($rutina->likes)}} les gustó</p>
                                    
                        </div>
                        <p>{{ Str::words(strip_tags( $rutina ->descripcion ), 20)}}</p>
                        <a class="btn btn-primary d-block" href="{{route('usuarios.rutinas.show', ['rutina' => $rutina->slug])}}">Ver rutina</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria mt-5 mb-4">
            Ultimas entradas
        </h2>
        <div class="my-slider3">
            @foreach ($nuevasEntradas as $nuevaEntrada)

            <div class="col-md-4 mt-4">

                <div class="card">
                    <img src="{{$nuevaEntrada->imagen}}" class="card-img-top "alt="imagen receta">
                    <div class="card-body">
                        <h3 class="text-center">{{$nuevaEntrada->titulo}}</h3>
                        <p>{{ Str::words(strip_tags( $nuevaEntrada->descripcion ), 20)}}</p>
                        <a class="btn btn-primary d-block font-weight-light" href="{{route('usuarios.blog.show', ['blog' => $nuevaEntrada->slug])}}">Ver rutina</a>
                    </div>
                </div>
            </div>         
            @endforeach
        </div>
    </div>

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria mt-5 mb-4">
            Ultimas recetas
        </h2>
        <div class="my-slider4">
            @foreach ($nuevasRecetas as $nuevaReceta)

            <div class="col-md-4 mt-4">

                <div class="card">
                    <img src="{{$nuevaReceta->imagen}}" class="card-img-top "alt="imagen receta">
                    <div class="card-body">
                        <h3 class="text-center">{{$nuevaReceta->titulo}}</h3>
                        <p>{{ Str::words(strip_tags( $nuevaReceta->descripcion ), 20)}}</p>
                        <a class="btn btn-primary d-block font-weight-light" href="{{route('usuarios.recetas.show', ['receta' => $nuevaReceta->slug])}}">Ver rutina</a>
                    </div>
                </div>
            </div>         
            @endforeach
        </div>
    </div>
@endsection


@section('hero-categorias')
   
    <div class="hero-categorias">
        {{--<form class="container h-100" action={{ route('buscar.show') }}>--}}
            <div class="row h-100 align-items-center">
                <div class="col-md-4 contenedor-hero-categorias">
                    <p class="caption-hero">Explora nuestras diferentes categorías</p>
                </div>
            </div>
        {{--</form>--}}
    </div>
    
@endsection


@section('categorias')


    @foreach($rutinacat as $key => $grupo)

        <div class="container">
            <h2 class="titulo-categoria mt-3 mb-4 text-capitalize">{{str_replace('-',' ', $key)}}</h2>
            <div class="row">
                @foreach($grupo as $recetas)
                    @foreach($recetas as $receta)
                    <div class="col-md-4 mt-4">
                        <div class="card shadow">
                            <img class="card-img-top"src="/storage/{{$receta->imagen}}" alt="imagen receta">
                            <div class="card-body">
                                <h3 class="card-title">{{$receta->titulo}}</h3>
                                <div class="meta-receta d-flex justify-content-between">
                                        @php
                    
                                        $fecha=$receta->created_at
                                        
                                        @endphp
                    
                                        <fecha-receta fecha="{{$fecha}}"></fecha-receta>
                                        <p>{{count($receta->likes)}} les gustó</p>
                                    
                                </div>
                                <p>{{ Str::words(strip_tags( $receta ->preparacion ), 20)}}</p>
                                <a class="btn btn-primary d-block" href="{{route('usuarios.rutinas.show', ['rutina' => $receta->slug])}}">Ver rutina</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        
        
    @endforeach

    
@endsection


