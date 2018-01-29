<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementaryStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementary_student', function (Blueprint $table) {
            $table->increments('elementary_id');
            $table->integer('spi_id')->unsigned();
            $table->integer('sl_id')->unsigned();
            $table->string('sch_name')->nullable();
            $table->string('sch_year')->nullable();
            $table->string('sector')->nullable();
            $table->string('highest_level')->nullable();
            $table->string('academic_honor')->nullable();
            $table->string('last_school');
            $table->timestamps();

            $table->foreign('spi_id')
                  ->references('spi_id')
                  ->on('stud_per_info')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('sl_id')
                  ->references('sl_id')
                  ->on('school_lists')
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
        Schema::drop('elementary_student');
    }
}
