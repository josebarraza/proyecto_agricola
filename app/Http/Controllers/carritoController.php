<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Producto;
use Agricola\LineaCarrito;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Session;
use Redirect;
use Auth;


class carritoController extends Controller
{
    
    public function index()
    {
        $lineas = Auth::user()->carrito->lineasCarrito()->get();
        $total = Auth::user()->carrito->totalCarrito();
        return view('carrito.index',compact('lineas','total'));
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        //Lineas del cliente
        $lineas = Auth::user()->carrito->lineasCarrito;
        foreach ($lineas as $i => $linea) {
           if($linea->id_producto == $request->idProducto){
                 return response()->json(['mensaje' => 'Ese producto ya se añadió al carrito']);
           }
        }
            
       $lineaCarrito = new LineaCarrito();
       $lineaCarrito->id_carrito = Auth::user()->carrito->id;
       $lineaCarrito->id_producto = $request->idProducto;
       $lineaCarrito->save();
       return response()->json(['mensaje' => 'Producto añadido al carrito','grabo'=>true]);
            
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($data)
    {
       
    }

    
    public function update(Request $request, $id)
    {
        $salidaJSON  = array();
        foreach ($request->datos as $index => $linea) {
            $lineaCarrito = LineaCarrito::find($linea[0]);
            $lineaCarrito->cantidad = $linea[1];
            $lineaCarrito->save();
            array_push($salidaJSON, $lineaCarrito->subTotal());
        }
        return response()->json($salidaJSON);
    }

    
    public function destroy(Request $request,$id)
    {
        if($request->ajax()){
            LineaCarrito::destroy($request->idLinea);
            $lineas = Auth::user()->carrito->lineasCarrito()->get();
            $total = Auth::user()->carrito->totalCarrito();
            return response()->json(view('carrito.parcial',compact('lineas','total'))->render());
        }
    }
}
