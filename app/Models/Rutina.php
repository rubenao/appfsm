<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    use HasFactory;

     // Campos que se agregaran
     protected $fillable = [
        'titulo', 
        'descripcion', 
        'url', 
        'slug',
        'imagen', 
        'categoria_id',
        'nivel_id',
        'equipo_id'
    ];

    public function nivel(){

        return $this->belongsTo(NivelRutina::class);
    }

    public function equipo(){

        return $this->belongsTo(EquipoRutina::class);
    }

    public function categoria()
    {
       return $this->belongsTo(CategoriaRutina::class);
    }

    public function autor(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes(){

        return $this->belongsToMany(User::class, 'likes_receta');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
