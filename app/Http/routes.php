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
Route::get('misCompras','FrontController@compras');
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
Route::resource('compra','comprasController');
Route::resource('almacen','almacenController');
Route::resource('produccion','produccionController');
Route::resource('certificaciones','certificacionesController');
Route::get('carritos/eliminarTodas','carritoController@eliminarTodas');
Route::get('pedido','carritoController@pedido');
Route::resource('compras','comprasController');
Route::resource('almacen','almacenController');
Route::get('traer-direccion','carritoController@traerAddress');
Route::get('traer-tarjeta','tarjetaController@traerTarjeta');
Route::resource('venta/new','ventaController@createVenta');
Route::get('venta/pdf/{id}','ventaController@ventaPDF');
Route::resource('pedimentos','pedimentosController');
Route::resource('pedimentosAprobado','pedimentosAprobadoController');


header('Access-Control-Allow-Origin: *');


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







    
