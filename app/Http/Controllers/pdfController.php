<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Bodega;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;

class pdfController extends Controller
{
    public function pdf($id){
        $bodega = Bodega::find($id);
        $vista =  \View::make('pdf.bodega', compact('bodega'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);

       return $pdf->download('bodega.pdf');
    }
}
