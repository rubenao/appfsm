<?php

namespace Database\Seeders;

use App\Models\NivelRutina;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        NivelRutina::create([
            'nombre' => 'Principiante',
        ]);

        NivelRutina::create([

            'nombre' => 'Intermedio'
        ]);

        NivelRutina::create([

            'nombre' => 'Avanzado'
        ]);
    }
}
