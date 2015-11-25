<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;

use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;

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
        if($request->ajax()){
           return  $request->all();
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
