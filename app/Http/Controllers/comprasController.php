<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;

use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Session;
use Redirect;
use Agricola\Producto;
use Agricola\Pais;
use Agricola\Almacen;
use Agricola\Compra;
use Agricola\Inventario;

class comprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $compras=Compra::all();
        return view('compra.index', compact('compras'));
    }
    public function create()
    {
        $productos=Producto::all();
        $paises=Pais::all();
        $almacenes=Almacen::all();
        return view('compra.create', compact('paises','productos','almacenes'));
    }

    public function store(Request $request)
    {
        $almacen=Almacen::find($request->almacen);
        if(($almacen->stock + $request->cantidad ) > $almacen->capacidad){
            Session::flash('message','No existe espacio suficiente en el almacen, intenta con otro.');
            return Redirect::to('compra');
        }

        $almacen->stock= $almacen->stock+$request->cantidad;
        $almacen->save();

        $inventario = new Inventario();
        $inventario->fechacosecha=$request->fechacosecha;
        $inventario->cantidad=$request->cantidad;
        $inventario->status=0;
        $inventario->id_producto=$request->producto;
        $inventario->id_almacen=$request->almacen;
        $inventario->save();

        $compra=new Compra();
        $compra->precio=$request->costo;
        $compra->proveedor=$request->proveedor;
        $compra->id_ciudad=$request->id_ciudad;
        $compra->id_inventario=$inventario->id;
        $compra->cantidad=$request->cantidad;
        $compra->save();

        Session::flash('message','Acción completada con éxito');
        return Redirect::to('compra');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
