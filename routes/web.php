<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Usuario\BlogController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Usuario\ComidaController;
use App\Http\Controllers\Usuario\PerfilController;
use App\Http\Controllers\Usuario\RecetaController;
use App\Http\Controllers\Usuario\RutinaController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' =>true]);
//Ruta de la pagina principal de la aplicacion
Route::get('/', 'App\Http\Controllers\InicioController@index')->name('inicio.index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home.index');


//Route::get('/verificacion', 'App\Http\Controllers\Auth\VerificationController@index')->name('verificacion.index');


//Rutas de los usuarios
Route::prefix('usuarios')->name('usuarios.')->group(function(){

    Route::resource('rutinas',  RutinaController::class)->names('rutinas');
    Route::resource('recetas',  RecetaController::class)->names('recetas');
    Route::resource('blog',  BlogController::class)->names('blog');
    Route::resource('comidas', ComidaController::class)->names('comidas');
    Route::resource('perfil', PerfilController::class)->names('perfil')->except(['index', 'destroy', 'create']);
    Route::get('/entrenamientos', 'App\Http\Controllers\Usuario\EntrenamientoController@index')->name('entrenamiento.index');
    Route::get('/condicion', 'App\Http\Controllers\Usuario\CondicionController@index')->name('condicion.index');
    Route::get('/dashboard', 'App\Http\Controllers\Usuario\DashboardController@index')->name('dashboard.index');

});


//Rutas del administrador
Route::prefix('administrador')->name('admin.')->group(function(){

    Route::resource('roles',  RoleController::class)->names('roles');
    Route::resource('usuarios',  UsuarioController::class)->names('usuarios');
    Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardAdminController@index')->name('dashboard.index');

});



// Almacena los likes de las recetas
Route::post('/usuarios/rutinas/{rutina}', 'App\Http\Controllers\LikesController@update')->name('likes.update');
