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
                            'capacidad'
    						];
}