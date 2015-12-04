<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aniocosecha');
            $table->integer('mescosecha');
            $table->integer('cantidad');
            $table->integer('status');
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->integer('id_almacen')->unsigned();
            $table->foreign('id_almacen')->references('id')->on('almacenes');
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
        Schema::drop('inventarios');
    }
}
