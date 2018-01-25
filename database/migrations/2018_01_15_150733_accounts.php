<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Accounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('account_id');
            $table->integer('account_id')->length(45);
            $table->string('account_type')->length(45);

            $table->string('username')->length(255);
            $table->string('password')->length(255);
            $table->string('ssi_id')->length(10);
            $table->string('company_id')->length(45);
            $table->string('status')->length(12);

            
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
        Schema::dropIfExists('accounts');
    }
}
