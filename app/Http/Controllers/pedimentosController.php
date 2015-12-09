<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Venta;
use Agricola\User;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Session;
use Redirect;

class pedimentosController extends Controller
{
    //índice de pedimentos pendientes
     public function index(){
        $ventas = Venta::where('pedimento','pendiente')->paginate(8);
        return view('pedimentos.index',compact('ventas'));
    }

    public function update(Request $request,$id){
      $venta = Venta::find($request->idVenta);
      $venta->pedimento = $request->pedimento;
      $venta->save();
      $ventas = Venta::where('pedimento','')->paginate(8);
      return response()->json(view('pedimentos.parcial',compact('ventas'))->render());
    }

    
}
