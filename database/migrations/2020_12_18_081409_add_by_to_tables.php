<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddByToTables extends Migration
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
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');

        });
        Schema::table('preguntas_de_investigacion', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');

        });
        Schema::table('metadatos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');

        });
        Schema::table('bibliotecas', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');

        });
        Schema::table('criterios', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');

        });
        Schema::table('articulos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');

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
            $table->dropColumn(['created_by','updated_by','deleted_by']);
        });
        Schema::table('preguntas_de_investigacion', function (Blueprint $table) {
            //
            $table->dropColumn(['created_by','updated_by','deleted_by']);
        });
        Schema::table('metadatos', function (Blueprint $table) {
            //
            $table->dropColumn(['created_by','updated_by','deleted_by']);
        });
        Schema::table('bibliotecas', function (Blueprint $table) {
            //
            $table->dropColumn(['created_by','updated_by','deleted_by']);
        });
        Schema::table('articulos', function (Blueprint $table) {
            //
            $table->dropColumn(['created_by','updated_by','deleted_by']);
        });
        Schema::table('criterios', function (Blueprint $table) {
            //
            $table->dropColumn(['created_by','updated_by','deleted_by']);
        });

    }
}
