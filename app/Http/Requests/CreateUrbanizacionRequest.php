<?php

namespace inais\Http\Requests;

use inais\Http\Requests\Request;

class CreateUrbanizacionRequest extends Request
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
        //dd('validadio');
        return [
            'nombre'        => 'required|max:50|unique:urbanizacion,nombre',
            'descripcion'   => 'max:250'
        ];
    }
}
