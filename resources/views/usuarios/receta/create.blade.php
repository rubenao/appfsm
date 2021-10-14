@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection


@section('content')

<h2 class="text-center mb-5">Crear Receta</h2>


<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{ route('usuarios.recetas.store') }}" enctype="multipart/form-data" novalidate>
            @csrf

            
            <div class="form-group">
                <label for="titulo">Titulo de la receta</label>

                <input type="text"
                    name="titulo"
                    class="form-control @error('titulo') is-invalid @enderror "
                    id="titulo"
                    placeholder="Titulo Receta"
                    value={{ old('titulo') }}
                >

                @error('titulo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            
            <div class="form-group mt-3">
                <label for="ingredientes">Ingredientes</label>
                <input id="ingredientes" type="hidden" name="ingredientes" value="{{ old('ingredientes') }}">
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
                <input id="preparacion" type="hidden" name="preparacion" value="{{ old('descripcion')}}">
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
                <label for="imagen">Elige la imagen</label>

                <input 
                    id="imagen" 
                    type="file" 
                    class="form-control @error('imagen') is-invalid @enderror"
                    name="imagen"
                >

                @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> 



            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Crear receta" >
            </div>

        </form>

    </div>
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection