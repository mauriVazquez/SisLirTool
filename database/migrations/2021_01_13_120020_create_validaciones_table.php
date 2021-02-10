<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('revision_id');
            $table->json('mejoras');
            $table->boolean('resuelto')->default(false);
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
        Schema::dropIfExists('validaciones');
    }
}
