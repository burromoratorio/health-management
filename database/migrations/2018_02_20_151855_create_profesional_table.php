<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dni');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('matricula')->nullable();
            /*$table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->bigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('waypoint_id');
            $table->bigInteger('total_load');
            $table->foreign('waypoint_id')->references('id')->on('customers_waypoints');
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('cliente_id')->on('CLIENTES');
            $table->integer('doc_type_id')->nullable();
            $table->foreign('doc_type_id')->references('id')->on('request_orders_types');
            $table->integer('order');
            $table->string('voucher_number')->nullable();
            $table->bigInteger('accumulated_km')->nullable();
            $table->dateTime('departured_at')->nullable();
            $table->dateTime('arrived_at')->nullable();
            $table->dateTime('est_departured_at')->nullable();
            $table->dateTime('est_arrived_at')->nullable();
            $table->bigInteger('element_load')->nullable();
            $table->bigInteger('package_load')->nullable();*/
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
        Schema::drop('profesional');
    }
}
