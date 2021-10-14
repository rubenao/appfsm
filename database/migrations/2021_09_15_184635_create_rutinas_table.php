<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('categoria_rutinas', function (Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();

        });

        Schema::create('equipo_rutinas', function (Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();

        });

        Schema::create('nivel_rutinas', function (Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();

        });

       
        Schema::create('rutinas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('imagen');
            $table->string('url');
            $table->string('slug')->unique();
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que crea la rutina');
            $table->foreignId('categoria_id')->references('id')->on('categoria_rutinas')->comment('La categoría de la rutina');
            $table->foreignId('nivel_id')->references('id')->on('nivel_rutinas')->comment('El nivel de la rutina');
            $table->foreignId('equipo_id')->references('id')->on('equipo_rutinas')->comment('El equipo utilizado de la rutina');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutinas');
    }
}
