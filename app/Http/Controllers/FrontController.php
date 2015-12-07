<?php
namespace Agricola\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Agricola\Mensaje;
use Agricola\novedades;
use Agricola\Venta;

use Agricola\LineaCarrito;

class FrontController extends Controller
{

    public function __construct(){
      $this->middleware('auth',['only'=>'admin']);
    }
    
    public function index()
    {
        $novedades= novedades::all();
        return view('index',['novedades'=>$novedades]);
    }

    public function contacto(){
        return view('contacto');
    }

    public function about(){
        return view('about');
    }

    public function admin(){

      $mensajes = Mensaje::all()->count();  
      return view('admin',['mensajes'=>$mensajes]);    
   }

   public function compras(){
    $compras = Venta::where('user_id',Auth::user()->id)->get();
    return view('compras',compact('compras'));
   }

   


   
}
