<?php

namespace Database\Seeders;


use App\Models\EquipoRutina;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        EquipoRutina::create([

            'nombre' => 'Mancuernas'
        ]);

        EquipoRutina::create([

            'nombre' => 'Peso propio'
        ]);
    }
}
