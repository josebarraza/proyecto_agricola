<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;

use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Agricola\Pais;
use Agricola\Address;
use Agricola\DatosFacturacion;
use Auth;
use Session;
use Redirect;

class facturacionController extends Controller
{
    
    public function index()
    {
          $datos = Auth::user()->datosF;
          return view('facturacion.index',compact('datos'));
    }

   public function create(){
        
        $paises = Pais::all();
        return view('facturacion.create',compact('paises')); 
   }

    
    public function store(Request $request)
    {
        
        $direccion = new Address();
        $direccion->user_id = Auth::user()->id;
        $direccion->id_ciudad = $request->id_ciudad;
        $direccion->colonia = $request->colonia;
        $direccion->calle = $request->calle;
        $direccion->cp = $request->cp;
        $direccion->save();

        $datosF = new DatosFacturacion();
        $datosF-> address_id = $direccion->id;
        $datosF->user_id = Auth::user()->id;
        $datosF->razon_social = $request->razon_social;
        $datosF->rfc = $request->rfc;
        $datosF->email = $request->email;
        $datosF->save();
        Session::flash('message','Datos actualizados');
        return Redirect::to('/facturacion');
       
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
         $paises = Pais::all();
         $datos = DatosFacturacion::find($id);
        return view('facturacion.edit',compact('paises','datos'));
    }

    
    public function update(Request $request, $id)
    {
        $datos = DatosFacturacion::find($id);
        $datos->fill($request->all());
        $datos->save();
        $direccion = Address::find($datos->address->id);
        $direccion->fill($request->all());
        $direccion->save();
        Session::flash('message','Datos actualizada corréctamente');
        return Redirect::to('/facturacion');
        
    }

    
    public function destroy($id)
    {
        
    }
}
