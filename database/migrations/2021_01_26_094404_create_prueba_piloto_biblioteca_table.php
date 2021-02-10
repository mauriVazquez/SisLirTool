<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruebaPilotoBibliotecaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba_piloto_biblioteca', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prueba_piloto_id');
            $table->foreign('prueba_piloto_id')->references('id')->on('pruebas_piloto')->onDelete('cascade');
            $table->foreignId('biblioteca_id')->references('id')->on('bibliotecas')->onDelete('cascade');
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
        Schema::dropIfExists('prueba_piloto_biblioteca');
    }
}
