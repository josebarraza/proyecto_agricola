<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;
use Agricola\Inventario;
use Agricola\Ciudad;

class Produccion extends Model
{
  	protected $table="producciones";
    protected $fillable = ['precio',
    						'caracteristicas',
                'cantidad',
    						'dificultades',
    						'id_inventario',
    						'id_ciudad'];

   	public function ciudad(){
   		return $this->belongsTo('Agricola\Ciudad','id_ciudad');
   	}

   	public function inventario(){
   		return $this->belongsTo('Agricola\Inventario','id_inventario');
   	}
}
