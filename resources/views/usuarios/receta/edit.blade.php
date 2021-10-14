@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')

<h2 class="text-center mb-5">Editar Receta</h2>


<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{ route('usuarios.recetas.update', ['receta' => $receta->id]) }}" enctype="multipart/form-data" novalidate>
            @csrf

            @method('PUT')
            <div class="form-group">
                <label for="titulo">Titulo de la receta</label>

                <input type="text"
                    name="titulo"
                    class="form-control @error('titulo') is-invalid @enderror "
                    id="titulo"
                    placeholder="Titulo Receta"
                    value={{ $receta->titulo }}
                >

                @error('titulo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            
            <div class="form-group mt-3">
                <label for="ingredientes">Ingredientes</label>
                <input id="ingredientes" type="hidden" name="ingredientes" value="{{ $receta->ingredientes }}">
                <trix-editor 
                    class="form-control @error('ingredientes') is-invalid @enderror "
                    input="ingredientes"
                ></trix-editor>

                @error('ingredientes')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="preparacion">Preparacion</label>
                <input id="preparacion" type="hidden" name="preparacion" value="{{ $receta->preparacion }}">
                <trix-editor 
                    class="form-control @error('preparacion') is-invalid @enderror "
                    input="preparacion"
                ></trix-editor>

                @error('preparacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="imagen">Elige una imagen</label>

                <input 
                    id="imagen" 
                    type="file" 
                    class="form-control @error('imagen') is-invalid @enderror"
                    name="imagen"
                >
                <div class="mt-4">
                    <p>Imagen Actual:</p>

                    {{--<img src="/storage/{{$rutina->imagen}}" style="width: 300px">--}}
                    <img src="{{$receta->imagen}}" style="width: 300px">
                </div>

                @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>



            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Actualizar Receta" >
            </div>

        </form>

    </div>
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection