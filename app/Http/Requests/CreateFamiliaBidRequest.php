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
            'folio'         => 'required|max:9999999999|min:1|numeric|unique:familia_bid,folio',
            'facilitador_id'   => 'required|numeric',
            'distrito_id'   => 'required|numeric',
            'urbanizacion_id'  => 'required|numeric',
            'via_id'  => 'required|numeric',
            'direccion'  => 'required|max:100',
            'numero_puerta' => 'required|max:6',
            'nombre_jefe_hogar' => 'required|max:100|alpha',
            'telefono' => 'min:2000000|max:79999999|numeric',
            'alcantarillado_id' => 'required|numeric',
            'latitud'       => 'numeric|between:-20.999999,-10.000000',
            'longitud'       => 'numeric|between:-70.999999,-65.000000',
            'altura'        => 'numeric|between:2800,4800',
            'otras_referencias' => 'max:250'
        ];
    }
}
