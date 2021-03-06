<?php

namespace Agricola\Http\Requests;

use Agricola\Http\Requests\Request;

class BodegaCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'        => 'required|unique:bodegas',
            'ancho'         => 'required',
            'largo'         => 'required',
            'alto'          => 'required',
            'direccion'     => 'required',
            'colonia'       => 'required',
            'precio'        => 'required',
            'comentarios'   => 'required',
            'id_ciudad'     => 'required',
            'foto'          => 'required'
            
        ];
    }
}
