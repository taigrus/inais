<?php

namespace inais\Http\Requests;

use inais\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditFamiliaBidRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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
            'folio'         => 'required|max:9999999999|min:1|numeric|unique:familia_bid,folio,' . $this->route->getParameter('familias'),
            'facilitador_id'   => 'required|numeric',
            'urbanizacion_id'  => 'required|numeric',
            'via_id'  => 'required|numeric',
            'direccion'  => 'required|max:100',
            'numero_puerta' => 'required|max:6',
            'nombre_jefe_hogar' => 'required|max:100|alpha_spaces',
            'telefono' => 'required|min:0|max:79999999|numeric',
            'alcantarillado_id' => 'required|numeric',
            'latitud'       => 'required_with:longitud,altura|numeric|between:-21, 0',
            'longitud'      => 'required_with:latitud,altura|numeric|between:-71, 0',
            'altura'        => 'required_with:longitud,latitud|numeric|between:0,4800',
            'otras_referencias' => 'max:250'
        ];
    }
}
