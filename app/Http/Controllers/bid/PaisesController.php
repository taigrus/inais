<?php

namespace inais\Http\Controllers\bid;

use Illuminate\Http\Request;

use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use inais\Pais;

class PaisesController extends Controller
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

    public function getPaises()
    {
        //Retorna la lista de urbanizaciones para repoblar los selects
        $paises = Pais::select(['pais.id', 'pais.nombre'])->orderBy('pais.nombre','asc')->get();
        return response()->json(['success' => true, 'respuestaJSON' => $paises]);
    }

    public function getPais($id)
    {
      //abort(500);
        //Retorna los datos de la urbanizacion con $id
        $pais = Pais::findOrFail($id);
        return response()->json(['success' => true, 'respuestaJSON' => $pais]);
    }
}
