<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table="ventas";
    protected $fillable=['user_id','address_id'];

    public function lineasDeVenta(){
        return $this->hasMany('Agricola\LineaDeVenta','id_venta');
    }
    
    public function totalVenta(){
        $total = 0;
        foreach($this->lineasDeVenta as $index => $linea){
            $total= $total + $linea->subtotal();
        }
        return $total;
    }
}
