<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Address;
use Agricola\Venta;
use Agricola\Card;
use Agricola\Inventario;
use Agricola\Producto;
use Agricola\Almacen;
use Agricola\LineaDeVenta;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use DB;
use Auth;

class ventaController extends Controller
{
    
    
    public function createVenta(Request $request)
    {

    	DB::beginTransaction();	

    	$venta = new Venta();
    	//Ingreso nueva dirección?
       	if($request->direccion == 0){
       		$address = new Address();
	       	$address->user_id = Auth::user()->id;
	       	$address->id_ciudad = $request->ciudad;
	       	$address->colonia = $request->colonia;
	       	$address->calle = $request->calle;
	       	$address->cp = $request->cp;
       		$address->save();
       		$venta->address_id = $address->id;	

       	}
       	//
       	else{
       		$venta->address_id = $request->direccion;
       		
       	}

       	$venta->user_id = Auth::user()->id;
       	$venta->save();//Se graba la instancia de venta

       	
       	$card = Auth::user()->tarjeta;
        $card->user_id = Auth::user()->id;
       	$card->nombre   =  $request->nomCard;
       	$card->apellido =  $request->apCard;
       	$card->numero   = $request->numCard;
       	$card->fecha   	= $request->fechaCard;
       	$card->anio   	= $request->anioCard;
       	$card->codigo   = $request->codigoCard;
       	$card->save();//Se guarda la forma de pago

       	//Se bloquean del inventario las tuplas que coincidan en producto con lo que quiere comprar el usuario
       	foreach(Auth::user()->carrito->lineasCarrito as $i => $linea) {
        	DB::table('inventarios')->where('id_producto',$linea->producto->id)->lockForUpdate()->get();
       	}

       	//Recorremos las lineas de carrito
       	foreach (Auth::user()->carrito->lineasCarrito as $i => $linea) {
       		
       		//Función PEPS
       		$this->PEPS($linea);
       		
       		//actualizamos almacen
       		$almacen = Almacen::find($linea->producto->inventario->almacen->id);
       		$almacen->stock = $almacen->stock - $linea->cantidad;
       		$almacen->save();


       		//para cada linea de carrito se registra la linea de venta
       		$lineaVenta = new LineaDeVenta();
       		$lineaVenta->id_venta = $venta->id;
       		$lineaVenta->id_producto = $linea->producto->id;
       		$lineaVenta->cantidad = $linea->cantidad;
       		$lineaVenta->save(); 
       	}



       	DB::commit();

       	return response()->json(['mensaje'=>'Venta grabada']);
    }

    public function PEPS($linea){
    	$total = 0;
       		while($total != $linea->cantidad){

       			$oldInv = DB::table('inventarios')
       					->where('status','>=',3)
       						->where('cantidad','>',0)
       							->where('id_producto',$linea->producto->id)
       								->orderBy('fechacosecha','asc')->take(1)->get();
       			
       			$inv = Inventario::find($oldInv[0]->id);
       			
       			if($inv->cantidad <= ($linea->cantidad - $total) ){
       				$total = $total + $inv->cantidad;
       				$inv->cantidad = 0;
       			}
       			else{
       				$inv->cantidad = $inv->cantidad - ( $linea->cantidad - $total );
       				$total = $linea->cantidad;
       			}		
       			$inv->save();					
       		}
    }
    
    public function ventaPDF($id){
      $venta = Venta::find($id);
      return $venta->imprimePDF();
    }
    

    
}
