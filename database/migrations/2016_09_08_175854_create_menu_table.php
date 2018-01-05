<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for modules for filterin the permissions and others
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modulo_id')->unsigned();
            $table->foreign('modulo_id')->references('id')->on('modules');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->tinyInteger('nivel')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('menus');
    }
}
