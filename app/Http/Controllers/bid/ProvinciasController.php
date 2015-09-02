<?php

namespace inais\Http\Controllers\bid;

use Illuminate\Http\Request;

use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use inais\Provincia;


class ProvinciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProvincias()
    {
        //Retorna la lista de provincias para repoblar los selects
        $provincias = Provincia::select(['provincia.id', 'provincia.nombre'])->orderBy('provincia.nombre','asc')->get();
        return response()->json(['success' => true, 'provincias' => $provincias]);
    }

    public function getProvincia($id)
    {
        //Retorna los datos del provincia con $id
        $provincia = Provincia::findOrFail($id);
        return response()->json(['success' => true, 'provincia' => $provincia]);
    }

    public function getProvinciasDepartamento($idDepartamento)
    {

        //Retorna los provincias del pais con $idPais
        $provinciasDepartamento = Provincia::select(['provincia.id', 'provincia.nombre'])->where('provincia.departamento_id', '=', $idDepartamento)->orderBy('provincia.nombre','asc')->get();
        return response()->json(['success' => true, 'respuestaJSON' => $provinciasDepartamento]);
    }
}
