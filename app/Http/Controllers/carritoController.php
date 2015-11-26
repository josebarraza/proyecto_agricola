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
        return view('carrito.index');
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
        $producto = Producto::find($request->idProducto);
        $lineaCarrito = new LineaCarrito();
        $lineaCarrito->user_id = Auth::user()->id;
        $lineaCarrito->id_producto = $producto->id;
        $lineaCarrito->save();
        return response()->json(['mensaje' => 'Producto añadido al carrito']);
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
