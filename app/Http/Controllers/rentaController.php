<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;
use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Agricola\Renta;

class rentaController extends Controller
{
   
    public function index()
    {
        $rentas = Renta::paginate(8);
        return view('rentas.index',compact('rentas'));
    }


}
