<?php

namespace inais\Http\Requests;

use inais\Http\Requests\Request;

class EditUrbanizacionRequest extends Request
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
            'nombre'         => 'required|max:50|unique:urbanizacion,nombre,' . $this->route->getParameter('urbanizaciones'),
            'descripcion'    => 'max:250',
        ];
    }
}
