<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\User;
use Agricola\Carrito;
use Agricola\Card;
use Agricola\Http\Requests;
use Agricola\Http\Requests\UserCreateRequest;
use Agricola\Http\Requests\UserUpdateRequest;
use Agricola\Http\Controllers\Controller;
use Session;
use Redirect;
use Auth;

class userController extends Controller
{
    
    public function __construct(){
      $this->middleware('auth',['only'=>['index','create','edit']]);
    }

    public function index()
    {
        $users = User::paginate(8);
        return view('usuario.index',compact('users'));
        
    }
    public function create()
    {
        return view('usuario.create');
    }

    
    public function store(UserCreateRequest $request)
    {

        $usuario = new User();
        $usuario->nombre       = $request['nombre'];
        $usuario->apellido_pat = $request['apellido_pat'];
        $usuario->apellido_mat = $request['apellido_mat'];
        $usuario->email        = $request['email'];
        $usuario->password     = $request['password'];
        $carrito = new Carrito();
        $card = new Card();
        if($request['tipo']==null){ //Cliente registrándose
            $usuario->tipo = 1; 
            $usuario->save();
            $carrito->user_id = $usuario->id;
            $card->user_id = $usuario->id;
            $card->save();
            $carrito->save();
            Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
            return Redirect::back();
        }   
        else //Admin registrando usuarios
            $usuario->tipo = $request['tipo'];
        $usuario->save();
        $carrito->user_id = $usuario->id;
        $carrito->save();
        $card->user_id = $usuario->id;
        $card->save();
        Session::flash('message','Usuario creado corréctamente');
        return Redirect::to('/user');
        
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuario.edit',['user' => $usuario]);
    }

    
    public function update(UserUpdateRequest $request, $id)
    {
        $usuario = User::find($id);
        $usuario->fill($request->all());
        $usuario->save();

        Session::flash('message','Usuario actualizado corréctamente');
        return Redirect::to('/user');
    }

    
    public function destroy($id)
    {
        User::destroy($id);

        Session::flash('message','Usuario eliminado');
        return Redirect::to('/user');

    }
}
