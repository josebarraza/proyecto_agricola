<?php
namespace Agricola\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Agricola\Mensaje;

class FrontController extends Controller
{

    public function __construct(){
      $this->middleware('auth',['only'=>'admin']);
    }
    
    public function index()
    {
        return view('index');
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

   
}
