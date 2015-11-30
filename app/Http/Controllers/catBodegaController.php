<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Bodega;
use Agricola\Ciudad;
use Agricola\Renta;
use Agricola\User;
use Agricola\Foto;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use DB;


class catBodegaController extends Controller
{

    

    public function index()
    {
        $bodegas = Bodega::where('status',1)->paginate(4);        
        return view('catBodega.index',compact('bodegas'));
    }
    public function show($id)
    {
        $bodega     = Bodega::find($id); 
        $fotos      = Foto::where('id_bodega',($bodega->id))->get();
        return view('catBodega.show',['bodega'=>$bodega,'fotos'=>$fotos]);
    }

    public function edit($id)
    {
       
        
        //Bodega a rentar
        $bodega =  Bodega::find($id);

         //Cliente rentando
        // Auth::user();
        DB::beginTransaction();
            if($bodega->status!=2){
                //Nueva renta 
                DB::table('bodegas')->where('id', '=',$id)->lockForUpdate()->get();
                $renta = new Renta();
                $bodega->status = 2; //Cambio de status a rentada
                $renta->bodega_id  = $bodega->id;
                $renta->user_id = Auth::user()->id;
                $renta->fecha = date('Y-m-d');
                $renta->save();
                $bodega->save();
                $fecha = $renta->fecha;
         DB::commit();
             /*
            for($i=0;$i<10;$i++){
                $bodega =  Bodega::find($id);
                $bodega->status = $i;
                $bodega->save();
            }*/

        }
        else{
            $bodegaAux = Renta::where('bodega_id',$bodega->id)->get();
            $fecha = $bodegaAux[0]->fecha;
        }

        //Datos del pdf
        $datos = [
            'cliente' => Auth::user(),
            'bodega'  => $bodega,
            'fecha'   => $fecha
         ];

         return $bodega->imprimeRenta($datos);
    }

}