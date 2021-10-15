@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')

<h2 class="text-center mb-5">Editar Entrada: {{$blog->titulo}}</h2>


<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{ route('usuarios.blog.update', ['blog' => $blog->slug]) }}" enctype="multipart/form-data" novalidate>
            @csrf

            @method('PUT')
            <div class="form-group">
                <label for="titulo">Titulo de la entrada</label>

                <input type="text"
                    name="titulo"
                    class="form-control @error('titulo') is-invalid @enderror "
                    id="titulo"
                    placeholder="Titulo Entrada"
                    value="{{ $blog->titulo }}"
                >

                @error('titulo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            
            <div class="form-group mt-3">
                <label for="descripcion">Descripción</label>
                <input id="descripcion" type="hidden" name="descripcion" value="{{ $blog->descripcion }}">
                <trix-editor 
                    class="form-control @error('descripcion') is-invalid @enderror "
                    input="descripcion"
                ></trix-editor>

                @error('descripcion')
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
                    <img src="{{$blog->imagen}}" style="width: 300px">
                </div>

                @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>



            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Actualizar Entrada" >
            </div>

        </form>

    </div>
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection
    
