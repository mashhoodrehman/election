<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireTeacherUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_teacher_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grade');
            $table->string('gradeValue');
            $table->integer('teachers_id')->unsigned()->nullable();
            $table->integer('users_id')->unsigned()->nullable();
           
               $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('questionnaire_teacher_users');
    }
}
