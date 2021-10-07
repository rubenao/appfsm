@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
    <!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/min/tiny-slider.helper.ie8.js"></script><![endif]-->
    
@endsection

@section('content')

    <h1 class="text-center h3">Inicio de la pagina</h1>

    
    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
            Ultimas Rutinas
        </h2>

        <div class="my-slider">
            @foreach ($nuevas as $nueva)

            <div class="col-md-4 mt-4">

                <div class="card">
                    <img src="/storage/{{$nueva->imagen}}" class="card-img-top "alt="imagen receta">
                    <div class="card-body">
                        <h3 class="text-center">{{$nueva->titulo}}</h3>
                        <p>{{ Str::words(strip_tags( $nueva->descripcion ), 20)}}</p>
                        <a class="btn btn-primary d-block font-weight-light" href="{{route('usuarios.rutinas.show', ['rutina' => $nueva ->id])}}">Ver rutina</a>
                    </div>
                </div>

            </div>         
            @endforeach
        </div>



    </div>

    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Rutinas más votadas</h2>
        <div class="slider">
            
            @foreach($votadas as $rutina)
            <div class="col-md-4 mt-4">
                <div class="card shadow">
                    <img class="card-img-top"src="/storage/{{$rutina->imagen}}" alt="imagen receta">
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
                        <a class="btn btn-primary d-block" href="{{route('usuarios.rutinas.show', ['rutina' => $rutina ->id])}}">Ver rutina</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>

    

    @foreach($rutinacat as $key => $grupo)

        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{str_replace('-',' ', $key)}}</h2>
            <div class="row">
                @foreach($grupo as $recetas)
                    @foreach($recetas as $receta)
                    <div class="col-md-4 mt-4">
                        <div class="card shadow">
                            <img class="card-img-top"src="/storage/{{$receta->imagen}}" alt="imagen receta">
                            <div class="card-body">
                                <h3 class="card-title">{{$receta->titulo}}</h3>
                                {{--<div class="meta-receta d-flex justify-content-between">
                                        @php
                    
                                        $fecha=$receta->created_at
                                        
                                        @endphp
                    
                                        <fecha-receta fecha="{{$fecha}}"></fecha-receta>
                                        <p>{{count($receta->likes)}} les gustó</p>
                                        
                                </div>--}}
                                <p>{{ Str::words(strip_tags( $receta -> preparacion ), 20)}}</p>
                                <a class="btn btn-primary d-block" href="{{route('usuarios.rutinas.show', ['rutina' => $receta->id])}}">Ver rutina</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        
        
    @endforeach

    
@endsection


