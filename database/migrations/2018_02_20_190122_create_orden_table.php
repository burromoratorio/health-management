<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('prestacion_id')->nullable();
            $table->foreign('prestacion_id')->references('id')->on('prestacion');
            $table->dateTime('fecha')->nullable();
            $table->string('nro_orden');
            $table->string('codigo_autorizacion');
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
        Schema::drop('orden');
    }
}
