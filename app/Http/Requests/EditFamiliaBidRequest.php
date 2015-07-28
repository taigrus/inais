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
            'direccion'     => 'required|max:255',
            'latitud'       => 'required'
        ];
    }
}
