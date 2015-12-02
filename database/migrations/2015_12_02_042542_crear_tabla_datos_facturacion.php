<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDatosFacturacion extends Migration
{
    
    public function up()
    {
        Schema::create('datos_facturacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('razon_social');
            $table->string('rfc');
            $table->string('email');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::drop('addresses');
    }
}
