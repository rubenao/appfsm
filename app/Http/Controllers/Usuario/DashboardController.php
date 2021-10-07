<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Dashboard de los usuarios
    public function index(){

        $usuario= Auth()->user();

        return view('usuarios.dashboard', compact('usuario'));
        
    }
}
