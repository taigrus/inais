<?php

namespace inais\Http\Requests;

use inais\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditUrbanizacionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //En el contruscor se optiene la ruta para luego sacar los parametros de edicion
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
            'nombre'         => 'required|max:50|unique:urbanizacion,nombre,' . $this->route->getParameter('urbanizaciones'),
            'descripcion'    => 'max:250',
        ];
    }
}
