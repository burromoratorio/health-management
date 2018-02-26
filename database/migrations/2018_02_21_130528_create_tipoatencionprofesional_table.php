<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoatencionprofesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoatencionprofesional', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('profesional');
            $table->bigInteger('tipo_atencion_id')->nullable();
            $table->foreign('tipo_atencion_id')->references('id')->on('tipoatencion');
            $table->string('obs');
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
        Schema::drop('tipoatencionprofesional');
    }
}
