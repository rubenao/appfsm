<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Perfil;
use App\Models\Rutina;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //

        $rutinas= Rutina::where('user_id', $perfil -> user_id)->paginate(3);



        return view('usuarios.perfil.show', compact('perfil','rutinas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
        return view('usuarios.perfil.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //
        $data=request()->validate([
            'nombre'=> 'required',
            'biografia'=> 'required',
        ]);

        //Si el usuario sube una imagen

        if($request['imagen']) {
            // obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-perfil', 'public');

            // Resize de la imagen
            //$img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            //$img->save();

            // Asignar al objeto
            $array_imagen= ['imagen' => $ruta_imagen];
        }

        //Asignar nombre y url

        auth()->user()-> name = $data['nombre'];
        auth()->user()-> save();

        //Eliminar url y name de $data
        unset($data['url']);
        unset($data['nombre']);     
        //Asignar biografia e imagen
        auth()->user()->perfil()->update( array_merge(

            $data,
            $array_imagen ?? []
        ));

        //Guardar los datos

        //Redireccionamos

        return redirect()-> action('App\Http\Controllers\Usuario\RutinaController@index');
        //Actualizamos el perfil
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
