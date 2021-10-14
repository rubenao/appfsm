<?php

namespace App\Observers;

use App\Models\Rutina;
use Illuminate\Support\Str;

class RutinaObserver
{
    /**
     * Handle the Rutina "created" event.
     *
     * @param  \App\Models\Rutina  $rutina
     * @return void
     */
    public function saving(Rutina $rutina)
    {
        //

        $slug= Str::slug($rutina->titulo, '-');

        if(Rutina::where('slug', $slug)->exists())

            $slug= $slug . uniqid();

        $rutina->slug=strtolower($slug);
    }

}

   