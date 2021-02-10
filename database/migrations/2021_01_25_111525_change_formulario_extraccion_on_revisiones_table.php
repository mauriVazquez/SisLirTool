<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFormularioExtraccionOnRevisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('revisiones', function (Blueprint $table) {

            $table->dropColumn('formulario_generico');
            $table->json('formulario_extraccion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('revisiones', function (Blueprint $table) {
            $table->boolean('formulario_generico')->nullable();
            $table->dropColumn('formulario_extraccion');
        });
    }
}
