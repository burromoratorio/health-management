<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialidadprofesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidadprofesional', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('profesional');
            $table->bigInteger('especialidad_id')->nullable();
            $table->foreign('especialidad_id')->references('id')->on('especialidad');
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
        Schema::drop('especialidadprofesional');
    }
}
