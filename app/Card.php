<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
      protected $table = 'cards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'numero','fecha','anio','codigo','user_id'];

    public function cliente(){
    	return $this->belongsTo('Agricola\User','user_id');
    }

}
