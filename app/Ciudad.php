<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
     protected $table = 'ciudades';

    
    protected $fillable = ['ciudad','id_estado'];

    public function bodegas(){
    	return $this->hasMany('Agricola\Bodega');
    }

    public function estado(){
    	return $this->belongsTo('Agricola\Estado','id_estado');
    }
}
