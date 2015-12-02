<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;

use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Agricola\Pais;
use Agricola\Almacen;
use Session;
use Redirect;

class almacenController extends Controller
{
    public function index()
    {
        //
        $almacenes=Almacen::paginate(4);
        return view('almacen.index',compact('almacenes'));
    }

    public function create()
    {
        $paises=Pais::all();
        return view('almacen.create',compact('paises'));
    }

    public function store(Request $request)
    {
        //
        $almacen = new Almacen($request->all());
        $almacen->save();
        Session::flash('message','Almacen agregado correctamente.');
        return Redirect::to('almacen');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $almacen=Almacen::find($id);
        return view('almacen.edit',compact('almacen'));
    }

    public function update(Request $request, $id)
    {
        //
        $almacen = Almacen::find($id);
        $almacen->fill($request->all());
        $almacen->save();
        Session::flash('message','Bodega actualizada corréctamente');
        return Redirect::to('almacen');
    }

    public function destroy($id)
    {
        //
        Storage::delete(Almacen::find($id));
        Almacen::destroy($id);
        Session::flash('message','Almacen Eliminado');
        return Redirect::to('almacen');
    }
}
