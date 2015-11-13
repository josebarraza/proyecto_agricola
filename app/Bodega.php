<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Agricola\Ciudad;

class Bodega extends Model
{
    protected $table = 'bodegas';

    
    protected $fillable = ['nombre', 
    						'ancho', 
    						'largo',
    						'alto',
    						'direccion',
    						'colonia',
    						'precio',
    						'comentarios',
    						'status',
    						'id_ciudad',
                            'foto'
    						];

    public function ciudad(){
    	return $this->belongsTo('Agricola\Ciudad','id_ciudad');
    }
     
    	
    public function setFotoAttribute($path){
        
             
                $this->attributes['foto'] = Carbon::now()->second.$path->getClientOriginalName();
                $name = Carbon::now()->second.$path->getClientOriginalName();
                \Storage::disk('local')->put($name,\File::get($path));
             
        
    }					

}
