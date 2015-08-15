<?php

namespace inais\Http\Controllers\bid;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Session\TokenMismatchException;
use yajra\Datatables\Datatables;
use inais\Urbanizacion;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UrbanizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('bid.urbanizacion.index');
    }

    public function anyData()
    {
        $urbanizaciones = Urbanizacion::select(['urbanizacion.id', 'urbanizacion.nombre', 'urbanizacion.descripcion']);
        return Datatables::of($urbanizaciones)
            ->addColumn('action', function ($urbanizacion) {
                return '<a href="urbanizaciones/'.$urbanizacion->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Operaciones</a>';
            })->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        try {
            //
            return view("bid.urbanizacion.create");
        }
        catch(TokenMismatchException $e)
        {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', 'Su sesión ha expirado, por favor inicie sesión nuevamente.');
            return redirect()->route('home.index');
            //return 'No se encontro el usuari que quiere eliminar, presione atras en el navegador';
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateUrbanizacionRequest $request)
    {
        //
        try {
            //
            $urbanizacion = Urbanizacion::create($request->all());
            $urbanizacion->save();
            return redirect()->route('bid.urbanizaciones.index');
        }
        catch(TokenMismatchException $e)
        {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', 'Su sesión ha expirado, por favor inicie sesión nuevamente.');
            return redirect()->route('home.index');
            //return 'No se encontro el usuari que quiere eliminar, presione atras en el navegador';
        }
        catch(QueryException $e)
        {

            if($e->getCode()=='23505'){
            //dd($e);
                Session::flash('error-message', 'Error critico! no se pudo registrar el nombre de la urbanización duplicado, verifique los espacios al final e inicio del nombre');
                return redirect()->route('bid.urbanizaciones.index');
            }
            else
            {
                //dd($e);
                Session::flash('error-message', 'Error inesperado al efectuar la consulta a la BD (urbanizacionesController/método:store)!');
                return redirect()->route('bid.urbanizaciones.index');
            }
        }
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
}
