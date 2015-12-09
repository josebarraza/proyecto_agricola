<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;

use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Agricola\Venta;

class pedimentosAprobadoController extends Controller
{
   
    public function index()
    {
        $ventas = Venta::where('pedimento','<>','pendiente')->where('pedimento','<>','mx')->paginate(8);
        return view('pedimentos.aprobado',compact('ventas'));
    }


    
  


    
    

    
}
