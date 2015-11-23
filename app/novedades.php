<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class novedades extends Model
{
   protected $table = 'novedades';
    protected $fillable = ['img','referencia'];


    public function setFotoAttribute($path){
        $this->attributes['foto'] = Carbon::now()->second.$path->getClientOriginalName();
        $name = Carbon::now()->second.$path->getClientOriginalName();
        \Storage::disk('local')->put($name,\File::get($path));    
    }	
}
