<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Agricola\Bodega;
use Agricola\Foto;
use Redirect;
use Session;
class fotoController extends Controller
{
    
     public function __construct(){
      $this->middleware('auth',['only'=>['create']]);
    }

    public function index()
    {
        //
    }

  
    public function create()
    {
        $bodegas = Bodega::lists('nombre','id');
        return view('foto.create',compact('bodegas'));
    }

    
    public function store(Request $request)
    {   
       
        foreach($request['foto'] as $img){
            $foto = new Foto();
            $foto->foto         = $img;
            $foto->id_bodega    = $request['id_bodega'];
            $foto->save();
        }
        Session::flash('message','fotos grabadas correctamente');
        return Redirect::to('/admin');
       
    }

    

   
}
