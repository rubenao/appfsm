<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogObserver
{
    /**
     * Handle the Blog "created" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function saving(Blog $blog)
    {
        //
        $slug=Str::slug($blog->titulo, '-');

        if(Blog::where('slug', $slug)->exists())

            $slug= $slug . uniqid();

        $blog->slug=strtolower($slug);
    }
}

   