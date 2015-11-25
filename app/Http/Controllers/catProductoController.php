<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Producto;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Session;
use Redirect;
class catProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::paginate(4);
        return view('catProductos.index',compact('productos'));
    }

    
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        
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
