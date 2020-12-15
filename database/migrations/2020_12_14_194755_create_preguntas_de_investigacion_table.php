<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasDeInvestigacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas_de_investigacion', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta');
            $table->unsignedBigInteger('revision_id');
            $table->foreign('revision_id')->references('id')->on('revisiones');
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
        Schema::dropIfExists('pregunta_de_investigacions');
    }
}
