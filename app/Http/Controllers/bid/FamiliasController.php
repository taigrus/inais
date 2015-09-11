<?php

namespace inais\Http\Controllers\bid;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Session\TokenMismatchException;
use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use inais\FamiliaBid;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        return view('bid.familia.index', array('titulo' => 'Gestión de familias'));
    }

    public function anyData()
    {
        //return Datatables::of(User::select('*'))->make(true);
        //$users = Rol::join('users', 'users.rol_id','=','roles.id')->select(['users.id', 'users.first_name', 'users.last_name','users.email', 'users.password', 'users.created_at', 'users.updated_at', 'users.rol_id', 'roles.descripcion']);
        //$familias = FamiliaBid::select(['id', 'folio', 'facilitador_id', 'urbanizacion_id', 'via_id', 'direccion', 'latitud', 'longitud', 'altura', 'created_at', 'updated_at']);
        $familias=$familias=FamiliaBid::join('alcantarillado', 'alcantarillado.id', '=', 'familia_bid.alcantarillado_id')
            ->join('via', 'via.id', '=', 'familia_bid.via_id')
            ->join('facilitador_bid', 'facilitador_bid.id', '=', 'familia_bid.facilitador_id')
            ->join('urbanizacion', 'urbanizacion.id', '=', 'familia_bid.urbanizacion_id')
            ->join('distrito', 'distrito.id', '=', 'urbanizacion.distrito_id')
            ->select(
                [
                'familia_bid.id as id',
                'familia_bid.folio as folio',
                'facilitador_bid.nombre as facilitador',
                'distrito.nombre as distrito',
                'urbanizacion.nombre as urbanizacion',
                'via.nombre as via',
                'familia_bid.direccion as direccion',
                'familia_bid.numero_puerta as numero_puerta',
                'alcantarillado.descripcion as alcantarillado',
                'familia_bid.created_at as creada',
                'familia_bid.updated_at as actualizada'
                ]);
        return Datatables::of($familias)
            ->addColumn('action', function ($familia) {
                return '<a href="familias/'.$familia->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Gestionar</a>';
            })
            ->editColumn('creada', function ($familia) {
                return $familia->creada ? with(new Carbon($familia->creada))->format('d/m/Y') : '';
            })
            ->editColumn('actualizada', function ($familia) {
                return $familia->actualizada ? with(new Carbon($familia->actualizada))->format('d/m/Y') : '';
            })->make(true);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        try {
            //
            $facilitador_options = \DB::table('facilitador_bid')->orderBy('nombre', 'asc')->lists('nombre', 'id');
            $urbanizacion_options = \DB::table('urbanizacion')->orderBy('nombre', 'asc')->lists('nombre', 'id');
            $via_options = \DB::table('via')->orderBy('id', 'asc')->lists('nombre', 'id');
            $alcantarillado_options = \DB::table('alcantarillado')->orderBy('id', 'asc')->lists('descripcion', 'id');
            return view("bid.familia.create", array(
                    'facilitador_options' => $facilitador_options,
                    'urbanizacion_options' => $urbanizacion_options,
                    'via_options' => $via_options,
                    'alcantarillado_options' => $alcantarillado_options,
                    'titulo' => 'Registro de familias'
                )
            );
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
    public function store(Requests\CreateFamiliaBidRequest $request)
    {
        try {
            //
            $familia = FamiliaBid::create($request->all());
            $familia->save();
            return redirect()->route('bid.familias.index');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

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
            $facilitador_options = \DB::table('facilitador_bid')->orderBy('nombre', 'asc')->lists('nombre', 'id');
            $urbanizacion_options = \DB::table('urbanizacion')->orderBy('nombre', 'asc')->lists('nombre', 'id');
            $via_options = \DB::table('via')->orderBy('id', 'asc')->lists('nombre', 'id');
            $alcantarillado_options = \DB::table('alcantarillado')->orderBy('id', 'asc')->lists('descripcion', 'id');
            $familia = FamiliaBid::findOrFail($id);
            return view('bid.familia.edit', array(
                    'facilitador_options' => $facilitador_options,
                    'urbanizacion_options' => $urbanizacion_options,
                    'via_options' => $via_options,
                    'alcantarillado_options' => $alcantarillado_options,
                    'familia' => $familia,
                    'titulo' => 'Edición de familias'
                  )
            );
        }
        catch(ModelNotFoundException $e)
        {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', 'El registro que intentó actualizar no se ha podido encontrar.');
            return redirect()->route('bid.familias.index');
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
    public function update(Requests\EditFamiliaBidRequest $request, $id)
    {
        try
        {
            //
            //dd($request);
            $familia = FamiliaBid::findOrFail($id);
            $familia->fill($request->all());
            $familia->save();

            //return $redirect->route('admin.users.index');
            Session::flash('message', 'El registro perteneciente a la familia ' . $familia->folio . ' fue actualizado');
            return redirect()->route('bid.familias.index');
        }
        catch(ModelNotFoundException $e)
        {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', 'El registro que intentó actualizar no se ha podido encontrar.');
            return redirect()->route('bid.familias.index');
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
    public function destroy($id)
    {
        try {
            //
            $familia = FamiliaBid::findOrFail($id);

            //User::destroy($id);

            $familia->delete();

            //se debe usar el metodo Set en vez de flash en caso de que se quiera persistir el mensaje.
            Session::flash('message', 'El registro perteneciente a la familia ' . $familia->folio . ' fue eliminado');

            return redirect()->route('bid.familias.index');
        }
        catch(ModelNotFoundException $e)
        {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', 'El registro que intentó eliminar no se ha podido encontrar.');
            return redirect()->route('bid.familias.index');
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

}
