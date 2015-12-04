<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;
use Agricola\Inventario;
use Agricola\Ciudad;

class Produccion extends Model
{
  	protected $table="producciones";
    protected $fillable = ['precioUnitario',
    						'caracteristicas',
    						'dificultades',
    						'id_inventario',
    						'id_ciudad'];

   	public function ciudad(){
   		return $this->belogsTo('Agricola\Ciudad','id_ciudad');
   	}

   	public function inventario(){
   		return $this->hasOne('Agricola\Inventario','id_inventario');
   	}
}
