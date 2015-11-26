<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class LineaCarrito extends Model
{
    protected $table = "linea_carritos";
    protected $fillable = ['user_id','id_producto'];
}
