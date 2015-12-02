<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Agricola\Pais;
use Agricola\Bodega;
use Agricola\Estado;
use Agricola\Ciudad;

Route::get('/','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('about','FrontController@about');
Route::get('admin','FrontController@admin');
Route::resource('facturacion','facturacionController');
Route::resource('user','userController');
Route::resource('bodega','bodegaController');
Route::resource('Log','LoginController');
Route::resource('logout','LoginController@logout');
Route::resource('catBodegas','catBodegaController');
Route::resource('foto','fotoController');
Route::get('misBodegas','bodegasCliente@index');
Route::get('pdf/{id}','pdfController@pdf');
Route::get('rentas','rentaController@index');
Route::resource('mensajes','mensajeController');
Route::resource('card','tarjetaController');
Route::resource('product','productoController');
Route::resource('catProductos','catProductoController');
Route::resource('carrito','carritoController');
Route::get('carritos/eliminarTodas','carritoController@eliminarTodas');


Route::get('/estados',function(){
	$id_pais = Input::get('id_pais');
	$estados = Estado::where('id_pais','=',$id_pais)->orderBy('estado','asc')->get();
	return Response::json($estados);
	
});

Route::get('/ciudades',function(){
	$id_estado = Input::get('id_estado');
	$ciudades = Ciudad::where('id_estado','=',$id_estado)->orderBy('ciudad','asc')->get();
	return Response::json($ciudades);
	
});







    
