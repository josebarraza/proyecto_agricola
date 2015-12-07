<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;
use Agricola\Producto;
use Agricola\Almacen;

class Inventario extends Model
{
  	protected $table="inventarios";
    protected $fillable = ['aniocosecha',
    						'mescosecha',
    						'cantidad',
    						'status',
    						'id_producto',
    						'id_almacen'];

    public function producto(){
    	return $this->belongsTo('Agricola\Producto','id_producto');
    }
    public function almacen(){
    	return $this->belongsTo('Agricola\Almacen','id_almacen');
    }

    public function sumProducto(){
        return $this->belongsTo('Agricola\Producto','id_producto')->sum('cantidad');
    }
}
