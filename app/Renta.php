<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    protected $table = 'rentas';
    protected $fillable = ['user_id','bodega_id','fecha'];

       public function bodega(){
    	return $this->belongsTo('Agricola\Bodega','bodega_id');
    }

    public function cliente(){
    	return $this->belongsTo('Agricola\User','user_id');
    }
}
