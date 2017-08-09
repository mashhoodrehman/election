<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fName')->nullable();
            $table->string('lName')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->enum('role' , array('admin','student','parent'));
            $table->enum('status' , array('on','off'));
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();  
            $table->string('grade')->nullable();  
          
            $table->tinyInteger('verified')->default(0);
            $table->string('email_token')->index()->nullable();
            $table->rememberToken();
            $table->timestamps();
            /*$table->foreign('school_id_fk')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
