<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BlogController extends Controller
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
        $entradas=Blog::where('user_id', $usuario->id)->paginate(10);

        return view('usuarios.blog.index', compact('usuario', 'entradas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('usuarios.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
        //

        $data=$request->validate([

            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|max:2098', 


        ]);

        $data=request();

        $imagen_url=Cloudinary::upload($request->file('imagen')->getRealPath())->getSecurePath();

        auth()->user()->entradas()->create([

            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'slug' => $data['slug'],
            'imagen' => $imagen_url
        ]);

        return redirect()->action('App\Http\Controllers\Usuario\BlogController@index');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //

        return view('usuarios.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //

        return view('usuarios.blog.edit', compact('blog'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //

        $data=request();

        $blog->titulo=$data['titulo'];
        $blog->descripcion=$data['descripcion'];
        $blog->slug=$data['slug'];
        
        // Si el usuario sube una nueva imagen
        if(request('imagen')) {
            // obtener la ruta de la imagen
            $ruta_imagen = Cloudinary::upload($request->file('imagen')->getRealPath())->getSecurePath();

            // Resize de la imagen
            //$img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            //$img->save();

            // Asignar al objeto
            $blog->imagen = $ruta_imagen;
        }

        $blog->save();

        return redirect()->action('App\Http\Controllers\Usuario\BlogController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //

        $blog->delete();

        return redirect()->action('App\Http\Controllers\Usuario\BlogController@index');
    }
}
