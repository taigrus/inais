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
            'facilitador_id'   => 'required',
            'distrito_id'   => 'required',
            'urbanizacion_id'   => 'required',
            'via_id'   => 'required',
            'direccion'     => 'required|max:255',
            'numero_puerta' => 'required:max:6',
            'nombre_jefe_hogar' => 'required|max:100',
            'telefono' => 'required',
            'fecha_encuesta_lb' => 'required',
            'alcantarillado_id' => 'required',
            'latitud'       => 'required|regex:/-?[0-9]+(\.[0-9]{1,2})/',
            'longitud'       => 'required|regex:/-?[0-9]+(\.[0-9]{1,2})/',
            'altura'        => 'required|numeric'
        ];
    }
}
