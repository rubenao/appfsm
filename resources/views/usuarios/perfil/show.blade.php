@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">

            <div class="imagen-receta">
                <img src="/storage/{{$perfil->imagen}}" alt="" class="w-100 rounded-circle">
            </div>

        </div>
        <div class="col-md-7 mt-5">
            <h2 class="text-center mb-2 text-primary">
                {{$perfil->usuario->name}}
            </h2>
            <a href="{{$perfil->usuario->url}}">Visita mi url</a>

            <div class="biografia">
                {!!$perfil->biografia!!}
            </div>
        </div>
    </div>
</div>

<h2 class="text-center my-5">Rutinas creadas por: {{$perfil->usuario->name}}</h2>

<div class="container">
    <div class="row mx-auto bg-white p-4">
        @if (count(array($rutinas)) > 0)

            @foreach($rutinas as $rutina)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/storage/{{$rutina->imagen}}" class="img-top" alt="imagen rutina">

                        <div class="card-body">
                            <h3 class="text-center">{{$rutina->titulo}}</h3>
                            <a class="btn btn-primary d-block mt-4 font-weight-light" href="{{route('usuarios.rutinas.show',['rutina'=>$rutina->id])}}">Ver rutina</a>
                            
                        </div>
                        
                    </div>
                </div>


            @endforeach

        @else

            <p class="text-center w-100">No hay rutinas aun</p>
            
        @endif
    </div>

    <div class="d-flex justify-content-center">
        {{$rutinas->links()}}
    </div>
</div>
    
@endsection