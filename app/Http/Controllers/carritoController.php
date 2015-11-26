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
        $lineas = Auth::user()->lineasCarrito()->get();
        return view('carrito.index',compact('lineas'));
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
            if(!LineaCarrito::where('id_producto','=',$request->idProducto)){
                $producto = Producto::find($request->idProducto);
                $lineaCarrito = new LineaCarrito();
                $lineaCarrito->user_id = Auth::user()->id;
                $lineaCarrito->id_producto = $producto->id;
                $lineaCarrito->save();
                return response()->json(['mensaje' => 'Producto añadido al carrito','grabo'=>true]);
            }
            else{
                return response()->json(['mensaje' => 'Ese producto ya se añadió al carrito']);
            }
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        
    }
}
