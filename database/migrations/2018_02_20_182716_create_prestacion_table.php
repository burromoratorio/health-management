<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
			$table->bigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('profesional');
            $table->bigInteger('obrasocial_id')->nullable();
            $table->foreign('obrasocial_id')->references('id')->on('obrasocial');
            $table->dateTime('inicio')->nullable();
			$table->dateTime('fin')->nullable();
            $table->bigInteger('nro_prestador')->nullable();
            $table->decimal('monto', 10, 2);

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
        Schema::drop('prestacion');
    }
}
