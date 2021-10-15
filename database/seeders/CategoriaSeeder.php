<?php

namespace Database\Seeders;

use App\Models\CategoriaRutina;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        
        CategoriaRutina::create([
            'nombre' => 'Piernas',
        ]);
        CategoriaRutina::create([
            'nombre' => 'Espalda',
        ]);
        CategoriaRutina::create([
            'nombre' => 'Pectorales',
        ]);
        CategoriaRutina::create([
            'nombre' => 'Abdominales',
        ]);
        CategoriaRutina::create([
            'nombre' => 'Biceps y triceps',
        ]);
        CategoriaRutina::create([
            'nombre' => 'Hombros',
        ]);
        CategoriaRutina::create([
            'nombre' => 'Full body',
        ]);
        CategoriaRutina::create([
            'nombre' => 'Hiit',
        ]);
        CategoriaRutina::create([
            'nombre' => 'Calistenia',
        ]);
    }
}
