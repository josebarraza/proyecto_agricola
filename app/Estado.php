<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    
    protected $table = 'estados';

    
    protected $fillable = ['estado','id_pais'];

    public function ciudades(){
    	return $this->hasMany('Agricola\Ciudad');
    }

    public function pais(){
    	return $this->belongsTo('Agricola\Pais','id_pais');
    }
}
