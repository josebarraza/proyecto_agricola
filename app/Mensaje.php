<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
     protected $table = 'mensajes';
     protected $fillable = ['nombre','correo','celular','mensaje'];


}
