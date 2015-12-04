<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;

use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Agricola\Pais;
use Agricola\Producto;
use Agricola\Produccion;
use Agricola\Almacen;
use Agricola\inventario;
use Session;
use Redirect;

class produccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $producciones=Produccion::all();
        $inventarios=Inventario::all();
        return view('produccion.index', compact('producciones','inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productos=Producto::all();
        $paises=Pais::all();
        $almacenes=Almacen::all();
        return view('produccion.create', compact('paises','productos','almacenes'));
    }

    public function store(Request $request)
    {
        
        
        $inventario = new Inventario();
        $inventario->aniocosecha=$request->aniocosecha;
        $inventario->mescosecha=$request->mescosecha;
        $inventario->cantidad=$request->cantidad;
        $inventario->status=4;
        $inventario->id_producto=$request->producto;
        $inventario->id_almacen=$request->almacen;
        $inventario->save();

        $produccion=new Produccion();
        $produccion->precio=$request->costo;
        $produccion->caracteristicas=$request->caracteristicas;
        $produccion->dificultades=$request->dificultades;
        $produccion->id_ciudad=$request->id_ciudad;
        $produccion->id_inventario=$inventario->id;
        $produccion->cantidad=$request->cantidad;
        $produccion->save();

        Session::flash('message','Acción completada con éxito');
        return Redirect::to('produccion');

    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
