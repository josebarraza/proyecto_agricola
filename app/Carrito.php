<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table="carritos";
    protected $fillable=['user_id'];

    public function lineasCarrito(){
        return $this->hasMany('Agricola\LineaCarrito','id_carrito');
    }
    
    public function totalCarrito(){
        $total = 0;
        foreach($this->lineasCarrito as $index => $linea){
            $total= $total + $linea->subtotal();
        }
        return $total;
    }
}
