<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Producto extends Model
{
    protected $table="productos";
    protected $fillable = ['nombre', 'precio', 'saco_kilos','foto'];

     public function setFotoAttribute($path){      
        $this->attributes['foto'] = Carbon::now()->second.$path->getClientOriginalName();
        $name = Carbon::now()->second.$path->getClientOriginalName();
        \Storage::disk('local')->put($name,\File::get($path)); 
    }

    public function inventario(){
    	return $this->hasOne('Agricola\Inventario','id_producto');
    }	

}
