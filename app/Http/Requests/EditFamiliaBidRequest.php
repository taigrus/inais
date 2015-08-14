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
            'folio'         => 'required|max:15|unique:familia_bid,folio,' . $this->route->getParameter('familias'),
            'facilitador_id'   => 'required|numeric',
            'distrito_id'   => 'required|numeric',
            'urbanizacion_id'   => 'required|numeric',
            'via_id'   => 'required|numeric',
            'direccion'     => 'required|max:100',
            'numero_puerta' => 'required|max:6',
            'nombre_jefe_hogar' => 'required|max:100',
            'telefono' => 'required|max:8',
            'alcantarillado_id' => 'required|numeric',
            'latitud'       => 'required|numeric',
            'longitud'       => 'required|numeric',
            'altura'        => 'required|numeric'
        ];
    }
}
