<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Agricola\User;
use Agricola\Inventario;

class CreateCertificacionsTable extends Migration
{

    public function up()
    {
        Schema::create('certificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_inventario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_inventario')->references('id')->on('inventarios');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('certificaciones');
    }
}
