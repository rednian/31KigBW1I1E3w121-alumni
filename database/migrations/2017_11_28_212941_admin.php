<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('admin', function (Blueprint $table) {
            $table->increments('admin_id');            
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('department');
            $table->string('position');
            $table->string('username');
            $table->string('password');
            $table->string('img');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}