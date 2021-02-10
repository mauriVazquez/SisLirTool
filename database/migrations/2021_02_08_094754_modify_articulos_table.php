<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('articulos', function (Blueprint $table) {
            //
            $table->dropColumn('criterios');
            $table->boolean('aceptado');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('articulos', function (Blueprint $table) {
            $table->json('criterios');
            $table->dropColumn('aceptado');
        });

    }
}
