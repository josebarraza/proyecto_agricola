<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class LineaDeVenta extends Model
{
    protected $table = "lineas_de_venta";
    protected $fillable = ['id_venta','id_producto','cantidad'];

    public function producto(){
    	return $this->belongsTo('Agricola\Producto','id_producto');
    }

    public function subtotal(){
    	return $this->cantidad*$this->producto->precio;
    }
}
