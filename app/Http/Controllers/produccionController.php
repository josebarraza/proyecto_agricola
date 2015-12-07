<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;

use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Agricola\Pais;
use Agricola\Producto;
use Agricola\Produccion;
use Agricola\Almacen;
use Agricola\Inventario;
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
        return view('produccion.index', compact('producciones'));
    }

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
        $almacen=Almacen::find($request->almacen);
        if(($almacen->stock + $request->cantidad ) > $almacen->capacidad){
            Session::flash('message','No hay suficiente espacio en el almacen.');
            return view('produccion');
        }

        $almacen->stock= $almacen->stock+$request->cantidad;
        $almacen->save();

        $inventario = new Inventario();
        $inventario->fechacosecha=$request->fechacosecha;
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
