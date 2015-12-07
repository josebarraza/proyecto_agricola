<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
      protected $table = 'cards';
    protected $fillable = ['nombre', 'apellido', 'numero','fecha','anio','codigo','user_id'];

    public function cliente(){
    	return $this->belongsTo('Agricola\User','user_id');
    }

}
