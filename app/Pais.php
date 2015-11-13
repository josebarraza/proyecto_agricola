<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
     protected $table = 'paises';

    
    protected $fillable = ['pais']; 

        public function estados(){
    	return $this->hasMany('Agricola\Estado');
    }
}
