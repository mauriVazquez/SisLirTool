<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigadorRevisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigador_revision', function (Blueprint $table) {
            $table->id();
            $table->foreignId('revision_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained() ->onDelete('cascade');
            $table->unique(array('revision_id','user_id'));
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
        Schema::dropIfExists('investigador_revision');
    }
}
