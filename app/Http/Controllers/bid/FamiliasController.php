<?php

namespace inais\Http\Controllers\bid;

use Illuminate\Http\Request;

use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use inais\FamiliaBid;
use Illuminate\Support\Facades\Session;

class FamiliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('bid.familia.index');
    }

    public function anyData()
    {
        //return Datatables::of(User::select('*'))->make(true);
        $familias = FamiliaBid::select(['id', 'folio', 'direccion','latitud', 'longitud', 'created_at', 'updated_at']);
        return Datatables::of($familias)
            ->addColumn('action', function ($familia) {
                return '<a href="familias/'.$familia->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Gestionar</a>';
            })
            ->editColumn('updated_at', function ($familia) {
                return $familia->updated_at->format('Y/m/d');})
            ->editColumn('created_at', function ($familia) {
                return $familia->created_at->format('Y/m/d');})
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view("bid.familia.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateFamiliaBidRequest $request)
    {
        //
        $familia = FamiliaBid::create($request->all());
        $familia->save();
        return redirect()->route('bid.familias.index');
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
        $familia = FamiliaBid::findOrFail($id);
        return view('bid.familia.edit', compact('familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\EditFamiliaBidRequest $request, $id)
    {
        //
        $familia = FamiliaBid::findOrFail($id);
        $familia->fill($request->all());
        $familia->save();

        //return $redirect->route('admin.users.index');
        Session::flash('message', 'El registro perteneciente a la familia ' . $familia->folio . ' fue actualizado');
        return redirect()->route('bid.familias.index');
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
        $familia = FamiliaBid::findOrFail($id);

        //User::destroy($id);

        $familia -> delete();

        //se debe usar el metodo Set en vez de flash en caso de que se quiera persistir el mensaje.
        Session::flash('message', 'El registro perteneciente a la familia ' . $familia->folio . ' fue eliminado');

        return redirect()->route('bid.familias.index');
    }
}
