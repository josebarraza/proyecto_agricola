<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodegas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->float('ancho');
            $table->float('largo');
            $table->float('alto');
            $table->string('direccion');
            $table->string('colonia');
            $table->integer('status')->default(1);
            $table->float('precio');
            $table->text('comentarios');
            $table->integer('id_ciudad')->unsigned();
            $table->foreign('id_ciudad')->references('id')->on('ciudades');
            $table->rememberToken();
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
        Schema::drop('bodegas');
    }
}
