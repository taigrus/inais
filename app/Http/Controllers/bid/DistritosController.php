<?php

namespace inais\Http\Controllers\bid;

use Illuminate\Http\Request;

use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use inais\Distrito;

class DistritosController extends Controller
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

    public function getDistritos()
    {
        //Retorna la lista de distritos para repoblar los selects
        $distritos = Distrito::select(['distrito.id', 'distrito.nombre'])->orderBy('distrito.nombre','asc')->get();
        return response()->json(['success' => true, 'distritos' => $distritos]);
    }

    public function getDistrito($id)
    {
        //Retorna los datos del distrito con $id
        $distrito = Distrito::findOrFail($id);
        return response()->json(['success' => true, 'distrito' => $distrito]);
    }

    public function getDistritosPoblacion($idPoblacion)
    {

        //Retorna los distritos del pais con $idPais
        $distritosPoblacion = Distrito::select(['distrito.id', 'distrito.nombre'])->where('distrito.poblacion_id', '=', $idPoblacion)->orderBy('distrito.nombre','asc')->get();
        return response()->json(['success' => true, 'respuestaJSON' => $distritosPoblacion]);
    }
}
