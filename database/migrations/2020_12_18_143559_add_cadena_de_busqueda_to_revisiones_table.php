<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCadenaDeBusquedaToRevisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('revisiones', function (Blueprint $table) {
            //
            $table->string('cadena_de_busqueda')->nullable();
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
            //
            $table->dropColumn(
                'cadena_de_busqueda'
            );
        });
    }
}
