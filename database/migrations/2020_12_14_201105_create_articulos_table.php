<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->boolean('leido');
            $table->string('archivo');
            $table->json('formulario_de_extraccion');
            $table->json('criterios');
            $table->foreignId('revision_id')->constrained()->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('prueba_piloto_id')->nullable();
            $table->foreign('prueba_piloto_id')->references('id')->on('pruebas_piloto')->onDelete('cascade');

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
        Schema::dropIfExists('articulos');
    }
}
