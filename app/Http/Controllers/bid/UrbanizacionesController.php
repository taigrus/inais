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
                return '<a href="urbanizaciones/'.$urbanizacion->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="#!" class="btn-borrar btn btn-xs btn-danger" data-id="' . $urbanizacion->id . '"><i class="glyphicon glyphicon-exclamation-sign"></i></a>';
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
            $mensaje='ok';

            $urbanizacion = Urbanizacion::create($request->all());
            $urbanizacion->save();

            if($request->ajax()){
                 return response()->json([
                    'mensaje' => $mensaje,
                    'tipo'    => 'ok'
                ]);
            }

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
                $mensaje='Error critico! no se pudo registrar el nombre de la urbanización duplicado, verifique los espacios al final e inicio del nombre';

                if($request->ajax()){
                    return response()->json([
                        'mensaje' => $mensaje,
                        'tipo'    => 'error'
                    ]);
                }
                Session::flash('error-message', $mensaje);
                return redirect()->route('bid.urbanizaciones.index');
            }
            else
            {
                //dd($e);
                $mensaje='Error inesperado al efectuar la consulta a la BD (urbanizacionesController/método:store)!';

                if($request->ajax()){
                    return response()->json([
                        'mensaje' => $mensaje,
                        'tipo'    => 'error'
                    ]);
                }
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
        try {
            $urbanizacion = Urbanizacion::findOrFail($id);
            return view('bid.urbanizacion.edit', compact('urbanizacion'));
        }
        catch(ModelNotFoundException $e)
        {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', 'El registro que intentó actualizar no se ha podido encontrar.');
            return redirect()->route('bid.urbanizaciones.index');
            //return 'No se encontro el usuari que quiere eliminar, presione atras en el navegador';
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
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\EditUrbanizacionRequest $request, $id)
    {
        //
        try
        {
            //
            $urbanizacion = Urbanizacion::findOrFail($id);
            $urbanizacion->fill($request->all());
            $urbanizacion->save();

            //return $redirect->route('admin.users.index');
            Session::flash('message', 'El registro perteneciente a la urbanización ' . $urbanizacion->nombre . ' con ID: ' . $urbanizacion->id . ' fue actualizado correctamente');
            return redirect()->route('bid.urbanizaciones.index');
        }
        catch(ModelNotFoundException $e)
        {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', 'El registro que intentó actualizar no se ha podido encontrar.');
            return redirect()->route('bid.urbanizaciones.index');
            //return 'No se encontro el usuari que quiere eliminar, presione atras en el navegador';
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        //
        try {
            //
            //abort(500);

            $urbanizacion = Urbanizacion::findOrFail($id);

            $mensaje = 'El registro perteneciente a la urbanización ' . $urbanizacion->nombre . ' con ID: ' . $urbanizacion->id . ' fue ELIMINADO correctamente';
            //User::destroy($id);

            $urbanizacion->delete();

            if($request->ajax()){
                return response()->json([
                    'id'      => $id,
                    'mensaje' => $mensaje,
                    'tipo'    => 'ok'
                ]);
            }

            //se debe usar el metodo Set en vez de flash en caso de que se quiera persistir el mensaje.
            Session::flash('message', $mensaje);
            return redirect()->route('bid.urbanizaciones.index');
        }
        catch(ModelNotFoundException $e)
        {

            $errormsg='El registro que intentó eliminar no se ha podido encontrar.';

            if($request->ajax()){
                return response()->json([
                    'id'      => $id,
                    'mensaje' => $errormsg,
                    'tipo'    => 'error'
                ]);
            }
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', $errormsg);
            return redirect()->route('bid.urbanizaciones.index');
            //return 'No se encontro el usuari que quiere eliminar, presione atras en el navegador';
        }
        catch(TokenMismatchException $e)
        {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', 'Su sesión ha expirado, por favor inicie sesión nuevamente.');
            return redirect()->route('home.index');
            //return 'No se encontro el usuari que quiere eliminar, presione atras en el navegador';
        }
    }

    public function crear_modal(){
        return view('bid.urbanizacion.createmodal');
    }
}
