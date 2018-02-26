<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudio', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('hc_id')->nullable();
            $table->foreign('hc_id')->references('id')->on('historiaclinica');
            $table->bigInteger('practica_medica_id')->nullable();
            $table->foreign('practica_medica_id')->references('id')->on('practicamedica');
            $table->dateTime('fecha')->nullable();
            $table->string('resultado');
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
        Schema::drop('estudio');
    }
}
