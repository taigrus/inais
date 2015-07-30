<?php

namespace inais\Http\Requests;

use inais\Http\Requests\Request;

class CreateFamiliaBidRequest extends Request
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
            'folio'         => 'required|unique:familia_bid,folio',
            'direccion'     => 'required|max:255',
            'latitud'       => 'required|regex:/[\d]{2}.[\d]{2}/',
            'longitud'       => 'required|regex:/[\d]{2}.[\d]{2}/',
            'altura'        => 'required|numeric'
        ];
    }
}
