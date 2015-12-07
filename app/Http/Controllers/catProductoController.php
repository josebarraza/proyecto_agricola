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
    
    public function index(Request $request)
    {
        $productos = Producto::paginate(4);
        return view('catProductos.index',compact('productos'));
    }

    
    
}
