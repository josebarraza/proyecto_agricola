<?php

namespace Agricola\Http\Requests;

use Agricola\Http\Requests\Request;

class mensajeRequest extends Request
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
        'celular' => 'phone:AUTO'
            //
        ];
    }
}
