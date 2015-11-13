<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Pais;
use Agricola\Bodega;
use Agricola\Http\Requests;
use Agricola\Http\Requests\BodegaCreateRequest;
use Agricola\Http\Requests\BodegaUpdateRequest;
use Agricola\Http\Controllers\Controller;
use Session;
use Redirect;
use Auth;

class bodegaController extends Controller
{
    
    public function __construct(){
      $this->middleware('auth',['only'=>['index','create','edit']]);
    }


    public function index()
    {
        
            $bodegas = Bodega::paginate(3);
            return view('bodega.index',compact('bodegas'));
        
    }

    
    public function create()
    {
        $paises = Pais::all();
        return view('bodega.create',compact('paises'));
    }

   
    public function store(BodegaCreateRequest $request)
    {
        
        $bodega = new Bodega();
        $bodega->nombre         = $request['nombre'];
        $bodega->ancho          = $request['ancho'];
        $bodega->largo          = $request['largo'];
        $bodega->alto           = $request['alto'];
        $bodega->direccion      = $request['direccion'];
        $bodega->colonia        = $request['colonia'];
        $bodega->precio         = $request['precio'];
        $bodega->comentarios    = $request['comentarios'];
        $bodega->id_ciudad      = $request['id_ciudad']; 
        $bodega->foto           = $request['foto']; 
        $bodega->save();

        Session::flash('message','Bodega agregada correctamente.');
        return Redirect::to('/bodega');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $bodega = Bodega::find($id);
        $paises = Pais::all();
        return view('bodega.edit',['bodega' => $bodega,'paises'=>$paises]);
    }

   
    public function update(Request $request, $id)
    {  
       
        $bodega = Bodega::find($id);
        $bodega->fill($request->all());
        $bodega->save();
        Session::flash('message','Bodega actualizada corréctamente');
        return Redirect::to('/bodega');
    }

   
    public function destroy($id)
    {
        \Storage::delete(Bodega::find($id)->foto);
         Bodega::destroy($id);
        
        

        Session::flash('message','Bodega Eliminada');
        return Redirect::to('/bodega');
    }

    
}
