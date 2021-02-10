<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruebasPilotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruebas_piloto', function (Blueprint $table) {
            $table->id();

            

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pruebas_piloto');
    }
}
