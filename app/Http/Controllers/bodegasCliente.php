<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Auth;
use Agricola\Renta;
use Agricola\Bodega;
class bodegasCliente extends Controller
{

      
  
    public function index()
    {
        $cliente = Auth::user()->id;
        $rentas = Renta::where('user_id',$cliente)->paginate(8);
        return view('bodegasCliente.index',compact('rentas'));
    }

   

    

    
}
