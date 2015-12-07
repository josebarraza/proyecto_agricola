<?php

namespace Agricola;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table="ventas";
    protected $fillable=['user_id','address_id'];

    public function lineasDeVenta(){
        return $this->hasMany('Agricola\LineaDeVenta','id_venta');
    }
    
    public function totalVenta(){
        $total = 0;
        foreach($this->lineasDeVenta as $index => $linea){
            $total= $total + $linea->subtotal();
        }
        return $total;
    }

       public function imprimePDF(){
        $venta = $this;
        $vista =  \View::make('pdf.venta', compact('venta'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
       return $pdf->download('venta.pdf');
    }

    public function address(){
        return $this->belongsTo('Agricola\Address','address_id');
    }
}
