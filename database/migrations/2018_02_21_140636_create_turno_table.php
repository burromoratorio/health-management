<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turno', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('paciente_id')->nullable();
            $table->foreign('paciente_id')->references('id')->on('paciente');
            $table->bigInteger('especialidad_profesional_id')->nullable();
            $table->foreign('especialidad_profesional_id')->references('id')->on('especialidadprofesional');
            $table->dateTime('fecha')->nullable();
            $table->string('estado');
            $table->decimal('plus', 10, 2);

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
        Schema::drop('turno');
    }
}
