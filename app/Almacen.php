<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacenes';

    
    protected $fillable = ['nombre', 
    						'direccion',
    						'colonia',
    						'id_ciudad',
                            'capacidad',
                            'stock'
    						];

    public function ciudad(){
    	return $this->belongsTo('Agricola\Ciudad','id_ciudad');
    }
    
    public function verificaCapacidad($cantidad){
        if(($this->stock + $cantidad ) > $this->capacidad){
            return false;
        }
        return true;
    }

    public function actualizaStock($cantidad){
        $this->stock= $this->stock+$cantidad;
        $this->save();
    }
}