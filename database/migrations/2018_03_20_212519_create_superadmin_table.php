<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperadminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if (!Schema::hasTable('superadmin')) {
            Schema::create('superadmin', function (Blueprint $table) {
                $table->increments('id');
                $table->string('firstname');
                $table->string('middlename')->nullable();
                $table->string('lastname');
                $table->string('gender');
                $table->string('religion');
                $table->string('avatar');
                $table->integer('role_id')->unsigned()->default(2);
                $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('superadmin');
    }
}
