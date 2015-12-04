<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Producciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('producciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('precio');
            $table->string('caracteristicas');
            $table->string('dificultades');
            $table->integer('cantidad');
            $table->integer('id_inventario')->unsigned();
            $table->foreign('id_inventario')->references('id')->on('inventarios');
            $table->integer('id_ciudad')->unsigned();
            $table->foreign('id_ciudad')->references('id')->on('ciudades');
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
        //
        Schema::drop('producciones');
    }
}
