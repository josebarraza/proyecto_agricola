<?php

namespace Agricola\Http\Controllers;

use Illuminate\Http\Request;

use Agricola\Http\Requests;
use Agricola\Http\Controllers\Controller;
use Agricola\Inventario;
use Agricola\User;

class certificacionesController extends Controller
{

    public function index()
    {
        // 
        $pendientes=Auth::user()->id;
        return view('certificacion',compact('pendientes'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
