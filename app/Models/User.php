<?php

namespace App\Models;

use App\Models\Perfil;
use App\Models\Rutina;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();
        //Asignamos el perfil una vez que se haya creado

        static::created(function ($user){

            $user->perfil()->create();

        });
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rutinas(){

        return $this->hasMany(Rutina::class);
    }

    public function entradas(){

        return $this->hasMany(Blog::class);
    }

    public function recetas(){

        return $this->hasMany(Receta::class);
    }

    public function perfil(){

        return $this->hasOne(Perfil::class);
    }

    public function megusta(){

        return $this->belongsToMany(Rutina::class, 'likes_receta');
    }
}
