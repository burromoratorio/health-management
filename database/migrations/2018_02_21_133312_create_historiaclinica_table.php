<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriaclinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiaclinica', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('paciente_id')->nullable();
            $table->foreign('paciente_id')->references('id')->on('paciente');
            $table->bigInteger('especialidad_profesional_id')->nullable();
            $table->foreign('especialidad_profesional_id')->references('id')->on('especialidadprofesional');
            $table->dateTime('fecha')->nullable();
            $table->string('diagnostico');
            $table->string('tratamiento');
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
        Schema::drop('historiaclinica');
    }
}
