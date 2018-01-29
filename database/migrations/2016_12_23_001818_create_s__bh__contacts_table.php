<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSBhContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_bh_contact', function (Blueprint $table) {
            $table->increments('sbhc_id');
            $table->string('s_cell');
            $table->string('s_phone');
            $table->integer('spi_id')->unsigned();
            $table->timestamps();

            $table->foreign('spi_id')
                  ->references('spi_id')
                  ->on('stud_per_info')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('s_bh_contact');
    }
}
