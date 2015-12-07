<?php

namespace Agricola;
use Agricola\Inventario;
use Agricola\User;


use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    //
	protected $table='certificaciones';
	protected $fillable=['id_usuario',
							'id_user'];

	public function inventario(){
   		return $this->belongsTo('Agricola\Inventario','id_inventario');
   	}

   	public function usuario(){
   		return $this->belongsTo('Agricola\User','id_usuario');
   	}

}
