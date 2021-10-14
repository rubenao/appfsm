<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Receta;
use App\Models\Rutina;
use App\Observers\BlogObserver;
use App\Observers\RecetaObserver;
use App\Observers\RutinaObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //Registramos el paginador de bootstrap

        Paginator::useBootstrap();

        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar',
        ]);

        Blog::observe(BlogObserver::class);
        Rutina::observe(RutinaObserver::class);
        Receta::observe(RecetaObserver::class);
    }
}
