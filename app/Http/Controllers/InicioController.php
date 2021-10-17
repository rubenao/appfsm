<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Receta;
use App\Models\Rutina;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoriaRutina;

class InicioController extends Controller
{
    //Pagina principal de la aplicacion
    public function index(){

        $votadas = Rutina::withCount('likes')->orderBy('likes_count','desc')->take(3)->get();
        

        //Obtener las rutinas, entradas y recetas más nuevas

        $nuevas = Rutina::latest()->take(5)->get();
        $nuevasEntradas = Blog::latest()->take(5)->get();
        $nuevasRecetas= Receta::latest()->take(5)->get();

        //Obtener todas las categorias

        $categorias = CategoriaRutina::all();

        //return $categorias;

        //Agrupar las recetas por categorias

        $rutinacat = [];
        foreach($categorias as $categoria) {
            $rutinacat[ Str::slug($categoria->nombre) ][]=Rutina::where('categoria_id',$categoria->id )->take(3)-> get();
        }

        return view('inicio', compact( 'nuevas', 'rutinacat', 'votadas', 'nuevasEntradas', 'nuevasRecetas'));
    }
}
