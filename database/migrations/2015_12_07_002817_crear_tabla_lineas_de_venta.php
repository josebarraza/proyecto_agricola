<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaLineasDeVenta extends Migration
{
    
    public function up()
    {
        Schema::create('lineas_de_venta', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_venta')->unsigned();
            $table->foreign('id_venta')->references('id')->on('ventas');

            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');

            $table->integer('cantidad');


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('lineas_de_venta');
    }
}
