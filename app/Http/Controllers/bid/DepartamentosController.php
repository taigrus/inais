<?php

namespace inais\Http\Controllers\bid;

use Illuminate\Http\Request;

use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use inais\Departamento;

class DepartamentosController extends Controller
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

    public function getDepartamentos()
    {
        //Retorna la lista de departamentos para repoblar los selects
        $departamentos = Departamento::select(['departamento.id', 'departamento.nombre'])->orderBy('departamento.nombre','asc')->get();
        return response()->json(['success' => true, 'departamentos' => $departamentos]);
    }

    public function getDepartamento($id)
    {
        //Retorna los datos del departamento con $id
        $departamento = Departamento::findOrFail($id);
        return response()->json(['success' => true, 'departamento' => $departamento]);
    }

    public function getDepartamentosPais($idPais)
    {

        //Retorna los departamentos del pais con $idPais
        $departamentosPais = Departamento::select(['departamento.id', 'departamento.nombre'])->where('departamento.pais_id', '=', $idPais)->orderBy('departamento.nombre','asc')->get();
        return response()->json(['success' => true, 'respuestaJSON' => $departamentosPais]);
    }
}
