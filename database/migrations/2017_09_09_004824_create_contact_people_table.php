<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_people', function (Blueprint $table) {
            $table->increments('contact_person_id');
            $table->integer('spi_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('contact_people');
    }
}
