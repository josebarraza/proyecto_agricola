<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = ['user_id','id_ciudad','colonia','calle'];

     public function ciudad(){
    	return $this->belongsTo('Agricola\Ciudad','id_ciudad');
    }
}
