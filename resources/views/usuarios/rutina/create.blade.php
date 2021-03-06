@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection



@section('content')

<h2 class="text-center mb-5">Crear Nueva Rutina</h2>


<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{ route('usuarios.rutinas.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo de la rutina</label>

                <input type="text"
                    name="titulo"
                    class="form-control @error('titulo') is-invalid @enderror "
                    id="titulo"
                    placeholder="Titulo Rutina"
                    value={{ old('titulo') }}
                >

                @error('titulo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="from-group">
                <label for="categoria">Categoria</label>

                <select
                    name="categoria"
                    class="form-control @error('categoria') is-invalid @enderror "
                    id="categoria"
                >
                    <option value="">-- Seleccione -</option>
                    @foreach ($categorias as $categoria)
                        <option 
                            value="{{ $categoria->id }}" 
                            {{ old('categoria') == $categoria->id ? 'selected' : '' }} 
                        >{{$categoria->nombre}}</option>
                    @endforeach
                </select>

                @error('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="from-group mt-3">
                <label for="nivel">Nivel de la rutina</label>

                <select
                    name="nivel"
                    class="form-control @error('nivel') is-invalid @enderror "
                    id="nivel"
                >
                    <option value="">-- Seleccione -</option>
                    @foreach ($niveles as $nivel)
                        <option 
                            value="{{ $nivel->id }}" 
                            {{ old('nivel') == $nivel->id ? 'selected' : '' }} 
                        >{{$nivel->nombre}}</option>
                    @endforeach
                </select>

                @error('nivel')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="from-group mt-3">
                <label for="equipo">Equipo utilizado en la rutina</label>

                <select
                    name="equipo"
                    class="form-control @error('equipo') is-invalid @enderror "
                    id="equipo"
                >
                    <option value="">-- Seleccione -</option>
                    @foreach ($equipos as $equipo)
                        <option 
                            value="{{ $equipo->id }}" 
                            {{ old('equipo') == $equipo->id ? 'selected' : '' }} 
                        >{{$equipo->nombre}}</option>
                    @endforeach
                </select>

                @error('equipo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="descripcion">Descripci??n</label>
                <input id="descripcion" type="hidden" name="descripcion" value="{{ old('descripcion') }}">
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
                <label for="imagen">Elige la imagen</label>

                <input 
                    id="imagen" 
                    type="file" 
                    class="form-control @error('imagen') is-invalid @enderror"
                    name="imagen"
                    value="{{old('imagen')}}"
                >

                @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> 

            <div class="form-group mt-3">
                <label for="url">Coloca el url de YouTube</label>

                <input 
                    id="url" 
                    type="text" 
                    class="form-control @error('url') is-invalid @enderror"
                    name="url"
                    value="{{old('url')}}"
                >

                @error('url')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar Rutina" >
            </div>

        </form>
    </div>
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection