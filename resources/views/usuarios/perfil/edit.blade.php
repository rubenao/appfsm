@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')

<h1 class="text-center">Editar mi perfil</h1>
{{$perfil->usuario}}
<div class="row justify-content-center mt-5">
    <div class="col-md-10 bg-white p-3">
        <form 
            action="{{route('usuarios.perfil.update', ['perfil'=> $perfil->id])}}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input 
                type="text" 
                name="nombre" 
                class="form-control
                 @error('nombre') is-invalid
                @enderror" 
                id="nombre" 
                placeholder="Ingresa tu nombre" 
                value="{{$perfil->usuario->name}}"
                >
                @error ('nombre')

                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>

                    </span>
                    
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="biografia">Biografia</label>
                <input type="hidden" 
                id="biografia" 
                name="biografia" 
                value="{{$perfil->biografia}}"
                >
                <trix-editor input="biografia"></trix-editor>
                @error ('biografia')

                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>

                    </span>
                    
                @enderror
            </div>

            
                
            
            <div class="form-group mt-4">
                <label for="imagen">Tu imagen</label>

                <input 
                    type="file"
                    id="imagen"
                    class="form-control"
                    name="imagen">

                @if ($perfil->imagen)

                    <div class="mt-4">
                        <p>Esta es la imagen actual</p>
                        <img src="/storage/{{$perfil->imagen}}" alt="" style="width: 300px">
                    </div>
                    @error ('imagen')

                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>

                        </span>
                        
                    @enderror
                @endif
            </div>
            

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Actualizar perfil">
            </div>

        </form>
    </div>
</div>
    
@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    
@endsection