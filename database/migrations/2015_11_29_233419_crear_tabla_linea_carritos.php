<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaLineaCarritos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_carritos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_carrito')->unsigned();
            $table->foreign('id_carrito')->references('id')->on('carritos');

            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');

            $table->integer('cantidad')->default(1);
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
    }
}
