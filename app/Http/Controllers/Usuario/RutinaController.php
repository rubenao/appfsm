<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Rutina;
use Illuminate\Http\Request;
use App\Models\CategoriaRutina;
use App\Http\Controllers\Controller;
use App\Models\EquipoRutina;
use App\Models\NivelRutina;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class RutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $usuario= Auth()->user();
        $rutinas=Rutina::where('user_id', $usuario->id)->paginate(10);


        return view('usuarios.rutina.index', compact('usuario', 'rutinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $niveles= NivelRutina::all(['id', 'nombre']);
        $equipos=EquipoRutina::all(['id', 'nombre']);
        $categorias = CategoriaRutina::all(['id', 'nombre']);

        return view('usuarios.rutina.create', compact('categorias', 'niveles', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Validacion de datos
        $data=$request->validate([
            'titulo' => 'required|min:6',
            'descripcion' => 'required',
            'url' => 'required',
            'imagen' => 'required|image|max:2098',         
            'categoria' => 'required',
            'nivel' => 'required',
            'equipo' => 'required',
        ]);

        $data=request();
      
        // obtener la ruta de la imagen
        //$ruta_imagen = $request['imagen']->store('upload-recetas', 'public');


        $ruta_imagen=Cloudinary::upload($request->file('imagen')->getRealPath())->getSecurePath();

        // almacenar en la BD (con modelo)
        auth()->user()->rutinas()->create([
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'url' => $data['url'],
            'slug' => $data['slug'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria'],
            'equipo_id' => $data['equipo'],
            'nivel_id' => $data['nivel']
        ]);

       // Redireccionar
       return redirect()->action('App\Http\Controllers\Usuario\RutinaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario\Rutina  $rutina
     * @return \Illuminate\Http\Response
     */
    public function show(Rutina $rutina)
    {
        //

        // Obtener si el usuario actual le gusta la receta y esta autenticado
        $like = ( auth()->user() ) ?  auth()->user()->megusta->contains($rutina->id) : false; 

        // Pasa la cantidad de likes a la vista
        $likes = $rutina->likes->count();
        return view('usuarios.rutina.show', compact('rutina', 'like', 'likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario\Rutina  $rutina
     * @return \Illuminate\Http\Response
     */
    public function edit(Rutina $rutina)
    {
        //
        $categorias = CategoriaRutina::all(['id', 'nombre']);
        $niveles= NivelRutina::all(['id', 'nombre']);
        $equipos=EquipoRutina::all(['id', 'nombre']);

        return view('usuarios.rutina.edit', compact('categorias', 'rutina', 'niveles', 'equipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario\Rutina  $rutina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rutina $rutina)
    {
        //
        $data=request();
        // Asignar los valores
        $rutina->titulo = $data['titulo'];
        $rutina->descripcion = $data['descripcion'];
        $rutina->url = $data['url'];
        $rutina->slug=$data['slug'];
        $rutina->categoria_id = $data['categoria'];


        // Si el usuario sube una nueva imagen
        if(request('imagen')) {
            // obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

            // Resize de la imagen
            //$img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            //$img->save();

            // Asignar al objeto
            $rutina->imagen = $ruta_imagen;
        }

        $rutina->save();

        // redireccionar
        return redirect()->action('App\Http\Controllers\Usuario\RutinaController@index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario\Rutina  $rutina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rutina $rutina)
    {
        //
        $rutina->delete();

        return redirect()->action('App\Http\Controllers\Usuario\RutinaController@index');
    }
}
