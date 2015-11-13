<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Http\Requests;
use Agricola\Http\Requests\mensajeRequest;
use Agricola\Http\Controllers\Controller;
use Redirect;
use Session;
use Agricola\Mensaje;
class mensajeController extends Controller
{

    public function __construct(){
      $this->middleware('auth',['only'=>'index']);
    }

    
    public function index()
    {
        $mensajes = Mensaje::paginate(10);
        return view('mensaje.index',compact('mensajes'));
    }
    public function store(Request $request)
    {
        Mensaje::create($request->all());
        Session::flash('message','Gracias por enviar tu mensaje');
        return Redirect::to("/");
    }

    public function destroy($id)
    {
        Mensaje::destroy($id);

        Session::flash('message','Mensaje Eliminado Correctamente');
        return Redirect::to('/mensajes');

    }
   
}
