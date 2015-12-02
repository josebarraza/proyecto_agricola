<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class DatosFacturacion extends Model
{
    protected $table = 'datos_facturacion';
    protected $fillable = ['razon_social','rfc','address_id','email','user_id'];

    public function address(){
    	return $this->belongsTo('Agricola\Address','address_id');
    }
}
