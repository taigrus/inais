<?php

namespace inais\Http\Controllers\bid;

use Illuminate\Http\Request;

use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use inais\Municipio;

class MunicipiosController extends Controller
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

    public function getMunicipios()
    {
        //Retorna la lista de municipios para repoblar los selects
        $municipios = Municipio::select(['municipio.id', 'municipio.nombre'])->orderBy('municipio.nombre','asc')->get();
        return response()->json(['success' => true, 'municipios' => $municipios]);
    }

    public function getMunicipio($id)
    {
        //Retorna los datos del municipio con $id
        $municipio = Municipio::findOrFail($id);
        return response()->json(['success' => true, 'municipio' => $municipio]);
    }

    public function getMunicipiosProvincia($idProvincia)
    {

        //Retorna los municipios del pais con $idPais
        $municipiosProvincia = Municipio::select(['municipio.id', 'municipio.nombre'])->where('municipio.provincia_id', '=', $idProvincia)->orderBy('municipio.nombre','asc')->get();
        return response()->json(['success' => true, 'respuestaJSON' => $municipiosProvincia]);
    }
}
