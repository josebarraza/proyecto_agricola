<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use Agricola\Http\Requests;
use Agricola\Http\Requests\LoginRequest;
use Agricola\Http\Controllers\Controller;

class LoginController extends Controller
{

     public function store(LoginRequest $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
          
           return Redirect::to('admin');
        }
        else{
            Session::flash('message','Datos de acceso incorrectos.');
            return Redirect::back();
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    
   
}
