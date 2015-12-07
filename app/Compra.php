<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
	protected $table='compras';
	protected $fillable = ['precio',
							'proveedor',
							'cantidad',
							'id_inventario',
							'id_ciudad'];

	public function inventario(){
		return $this->belongsTo('Agricola\Inventario','id_inventario');
	}

	public function ciudad(){
		return $this->belongsTo('Agricola\Ciudad','id_ciudad');
	}
}
