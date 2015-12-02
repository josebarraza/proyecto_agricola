<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class LineaCarrito extends Model
{
    protected $table = "linea_carritos";
    protected $fillable = ['id_carrito','id_producto','cantidad'];

    public function producto(){
    	return $this->belongsTo('Agricola\Producto','id_producto');
    }

    public function subtotal(){
    	return $this->cantidad*$this->producto->precio;
    }
}
