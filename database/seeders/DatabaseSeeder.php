<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        
        $this->call(RoleSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(EquipoSeeder::class);
        
    }
}
