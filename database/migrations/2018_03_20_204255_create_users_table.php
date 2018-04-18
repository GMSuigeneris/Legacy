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
        
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('username');
                $table->string('firstname');
                $table->string('middlename');
                $table->string('lastname');
                $table->string('gender');
                $table->string('religion');
                $table->string('avatar');
                $table->integer('level')->nullable();
                $table->string('semester')->nullable();
                $table->integer('faculty_id')->unsigned();
                $table->foreign('faculty_id')->references('id')->on('faculties');
                $table->integer('department_id')->unsigned();
                $table->foreign('department_id')->references('id')->on('departments');
                $table->integer('role_id')->unsigned()->default(3);
                $table->foreign('role_id')->references('id')->on('roles');
                $table->string('email')->unique();
                $table->string('password');
    
                $table->rememberToken();
                $table->timestamps();
            });
        }
        
       
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
