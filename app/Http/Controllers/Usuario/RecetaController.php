<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Receta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class RecetaController extends Controller
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
        $recetas=Receta::where('user_id', $usuario->id)->paginate(10);
        return view('usuarios.receta.index', compact('usuario', 'recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('usuarios.receta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Receta $receta)
    {
        //

        $data=request();

        $imagen_url=Cloudinary::upload($request->file('imagen')->getRealPath())->getSecurePath();

        auth()->user()->recetas()->create([

            'titulo' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'slug' => $data['slug'];
            'imagen' => $imagen_url
        ]);

        return redirect()->action('App\Http\Controllers\Usuario\RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //

        return view('usuarios.receta.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //

        return view('usuarios.receta.edit' ,compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
        $data=request();

        $receta->titulo=$data['titulo'];
        $receta->ingredientes=$data['ingredientes'];
        $receta->preparacion=$data['preparacion'];
        $receta->slug=$data['slug'];
        
        // Si el usuario sube una nueva imagen
        if(request('imagen')) {
            // obtener la ruta de la imagen
            $ruta_imagen = Cloudinary::upload($request->file('imagen')->getRealPath())->getSecurePath();

            // Resize de la imagen
            //$img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            //$img->save();

            // Asignar al objeto
            $receta->imagen = $ruta_imagen;
        }

        $receta->save();

        return redirect()->action('App\Http\Controllers\Usuario\RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
