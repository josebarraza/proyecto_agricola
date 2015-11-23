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
        return $bodega->imprimePDF();
    }
}
