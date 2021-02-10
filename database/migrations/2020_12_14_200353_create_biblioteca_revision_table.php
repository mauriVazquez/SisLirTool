<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibliotecaRevisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biblioteca_revision', function (Blueprint $table) {
            $table->id();
            $table->foreignId('revision_id')->constrained()->onDelete('cascade');
            $table->foreignId('biblioteca_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('biblioteca_revision');
    }
}
