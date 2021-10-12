@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')

<h1 class="text-center">Editar rutina : {{$rutina->titulo}}</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('usuarios.rutinas.update', ['rutina' => $rutina->id]) }}" enctype="multipart/form-data" novalidate>
                @csrf
                
                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Titulo de la rutina</label>

                    <input type="text"
                        name="titulo"
                        class="form-control @error('titulo') is-invalid @enderror "
                        id="titulo"
                        placeholder="Titulo Rutina"
                        value="{{ $rutina->titulo }}"
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
                                {{ $rutina->categoria_id == $categoria->id ? 'selected' : '' }} 
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
                    <label for="nivel">nivel de la rutina</label>

                    <select
                        name="nivel"
                        class="form-control @error('nivel') is-invalid @enderror "
                        id="nivel"
                    >
                        <option value="">-- Seleccione -</option>
                        @foreach ($niveles as $nivel)
                            <option 
                                value="{{ $nivel->id }}" 
                                {{ $rutina->nivel_id == $nivel->id ? 'selected' : '' }} 
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
                                {{ $rutina->equipo_id == $equipo->id ? 'selected' : '' }} 
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
                    <label for="descripcion">Descripcion de la rutina</label>
                    <input id="descripcion" type="hidden" name="descripcion" value="{{ $rutina->descripcion }}">
                    <trix-editor 
                        class="form-control @error('descripcion') is-invalid @enderror "
                        input="descripcion"></trix-editor>

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

                        <img src="/storage/{{$rutina->imagen}}" style="width: 300px">
                    </div>

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
                        value="{{ $rutina->url }}"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection