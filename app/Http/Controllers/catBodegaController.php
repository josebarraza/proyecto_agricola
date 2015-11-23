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
        $cliente = User::find(Auth::user()->id);

        if($bodega->status!=2){
            //Nueva renta 
            $renta = new Renta();

            $bodega->status = 2; //Cambio de status a rentada
            $renta->bodega_id  = $bodega->id;
            $renta->user_id = $cliente->id;
            $renta->fecha = date('Y-m-d');
            $renta->save();
            $bodega->save();
            $fecha = $renta->fecha;

        }
        else{
            $bodegaAux = Renta::where('bodega_id',$bodega->id)->get();
            $fecha = $bodegaAux[0]->fecha;
        }

        //Datos del pdf
        $datos = [
            'cliente' => $cliente,
            'bodega'  => $bodega,
            'fecha'   => $fecha
         ];


        $vista =  \View::make('pdf.renta', compact('datos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);

        
       return $pdf->download('renta.pdf');
    }

}