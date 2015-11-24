<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Session;
use Redirect;
use Agricola\Card;

class tarjetaController extends Controller
{
    
    public function index()
    {
        
    }

    
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        $tarjeta = new Card();
        $tarjeta->nombre = $request['nombre'];
        $tarjeta->apellido = $request['apellido'];
        $tarjeta->numero = $request['numero'];
        $tarjeta->fecha = $request['fecha'];
        $tarjeta->anio = $request['anio'];
        $tarjeta->user_id = Auth::user()->id;
        $tarjeta->codigo = $request['codigo'];
        $tarjeta->save();
        Session::flash('message','Se guardaron los cambios');
        return Redirect::back();
    }

    
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        //Se guardan los datos de la tarjeta de pago
        Auth::user()->tarjeta->fill($request->all());
        Auth::user()->tarjeta->save();
        Session::flash('message','Se guardaron los cambios');
        return Redirect::back();
    }

   
    public function destroy($id)
    {
        
    }
}
