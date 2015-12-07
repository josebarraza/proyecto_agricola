<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Producto;
use Agricola\Inventario;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Session;
use Redirect;
class productoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::paginate(8);
        return view('producto.index',compact('productos'));
    }

    
    public function create()
    {
        return view('producto.create');
    }

    
    public function store(Request $request)
    {
        $producto = new Producto($request->all());
        $producto->save();
        Session::flash('message','Producto agregado correctamente.');
        return Redirect::to('/product');
    }

    
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('producto.edit',compact('producto'));
    }

    
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->fill($request->all());
        $producto->save();
        Session::flash('message','Producto actualizado corréctamente');
        return Redirect::to('/product');
    }

    
    public function destroy($id)
    {
         \Storage::delete(Producto::find($id)->foto);
         Producto::destroy($id);
        Session::flash('message','Producto Eliminado');
        return Redirect::to('/product');   
    }
}
