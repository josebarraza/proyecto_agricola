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
                            'foto',
                            'modo_llegada',
                            'humedad',
                            'temperatura',
                            'ancho_entrada',
                            'alto_entrada'
    						];

    public function imprimePDF(){
        $bodega = $this;
        $vista =  \View::make('pdf.bodega', compact('bodega'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
       return $pdf->download('bodega.pdf');
    }
    public function imprimeRenta($datos){
        $vista =  \View::make('pdf.renta', compact('datos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
       return $pdf->download('renta.pdf');
    }

    public function ciudad(){
    	return $this->belongsTo('Agricola\Ciudad','id_ciudad');
    }
    public function modoLlegada(){
        return $this->belongsTo('Agricola\Modo','modo_llegada');
    }
     
    	
    public function setFotoAttribute($path){      
                $this->attributes['foto'] = Carbon::now()->second.$path->getClientOriginalName();
                $name = Carbon::now()->second.$path->getClientOriginalName();
                \Storage::disk('local')->put($name,\File::get($path)); 
    }					

}
