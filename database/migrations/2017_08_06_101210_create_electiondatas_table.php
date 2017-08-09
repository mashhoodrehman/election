<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectiondatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electiondatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('electiondatas_id')->unsigned()->nullable();
            $table->foreign('electiondatas_id')->references('id')->on('electiondatas')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('candidates_id')->unsigned()->nullable();
            $table->foreign('candidates_id')->references('id')->on('candidates')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('voters_id')->unsigned()->nullable();
            $table->foreign('voters_id')->references('id')->on('voters')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('electiondatas');
    }
}
