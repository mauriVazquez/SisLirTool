<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisiones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('meta_necesidad_informacion');
            //many to many con investigadores, metadatos, bibiliotecas
            $table->unsignedBigInteger('prueba_piloto_id')->nullable();
            $table->string('estado')->nullable();
            $table->boolean('formulario_generico')->nullable();
            $table->timestamps();

            $table->foreign('prueba_piloto_id')->references('id')->on('pruebas_piloto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisions');
    }
}
