<?php

namespace inais\Http\Controllers\bid;

use Illuminate\Http\Request;

use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use inais\Poblacion;


class PoblacionesController extends Controller
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
    public function getPoblaciones()
    {
        //Retorna la lista de poblacions para repoblar los selects
        $poblaciones = Poblacion::select(['poblacion.id', 'poblacion.nombre'])->orderBy('poblacion.nombre','asc')->get();
        return response()->json(['success' => true, 'poblaciones' => $poblaciones]);
    }

    public function getPoblacion($id)
    {
        //Retorna los datos del poblacion con $id
        $poblacion = Poblacion::findOrFail($id);
        return response()->json(['success' => true, 'poblacion' => $poblacion]);
    }

    public function getPoblacionesMunicipio($idMunicipio)
    {

        //Retorna los poblacions del pais con $idPais
        $poblacionesMunicipio = Poblacion::select(['poblacion.id', 'poblacion.nombre'])->where('poblacion.municipio_id', '=', $idMunicipio)->orderBy('poblacion.nombre','asc')->get();
        return response()->json(['success' => true, 'respuestaJSON' => $poblacionesMunicipio]);
    }
}
