<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Foto extends Model
{
    protected $table = 'fotos';
    protected $fillable = ['foto','id_bodega'];


    public function bodega(){
    	return $this->belongsTo('Agricola\Bodega','id_bodega');
    }

    public function setFotoAttribute($path){
                $this->attributes['foto'] = Carbon::now()->second.$path->getClientOriginalName();
                $name = Carbon::now()->second.$path->getClientOriginalName();
                \Storage::disk('local')->put($name,\File::get($path));    
    }	
}
