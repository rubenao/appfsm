<?php

namespace App\Observers;

use App\Models\Receta;
use Illuminate\Support\Str;

class RecetaObserver
{
    /**
     * Handle the Receta "created" event.
     *
     * @param  \App\Models\Receta  $receta
     * @return void
     */
    public function saving(Receta $receta)
    {
        //

        $slug = Str::slug($receta->titulo, '-');

        if(Receta::where('slug', $slug)->exists())

            $slug= $slug . uniqid();

        $receta->slug=strtolower($slug);


        
    }

   
}
