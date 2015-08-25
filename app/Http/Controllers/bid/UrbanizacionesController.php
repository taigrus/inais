<?php

namespace inais\Http\Controllers\bid;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Session\TokenMismatchException;
use yajra\Datatables\Datatables;
use inais\Urbanizacion;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Routing\Route;


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
                return '<a href="urbanizaciones/'.$urbanizacion->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-wrench"></i></a>
                <a href="#!" class="btn-editar btn btn-xs btn-success" data-id="' . $urbanizacion->id . '"><i class="glyphicon glyphicon-pencil"></i></a>
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
        return view("bid.urbanizacion.create");
    }

    public function store(Request $request)
    {
      try {
          //NOTE: esto sirve para obtener el id dd($this->route->getParameter('urbanizaciones'));
            $data = $request->all();
            //Se quita espacios de inicio y final y se convierte a mayusculas el array de datos
            $data['nombre'] = Str::upper(trim($data['nombre']));
            $data['descripcion'] = Str::upper(trim($data['descripcion']));
            $rules = array(
                'nombre'        => 'required|max:50|min:3|unique:urbanizacion,nombre',
                'descripcion'   => 'max:250|min:10'
            );
            $v=Validator::make($data, $rules);
            if($v->fails()){
                //si la validacion falla armamos los mensajes de error para el ajax
                if($request->ajax()){
                    $retorno='';
                    $errores = $v->errors()->all();
                    foreach($errores as $errorcito) {
                        $retorno = $retorno . $errorcito;
                    }
                    return response()->json([
                        'mensaje' => $retorno,
                        'tipo'    => 'error'
                    ]);
                }else {
                    return redirect()->back()
                        ->withErrors($v->errors())
                        ->withInput($data);
                }
            }
            $urbanizacion = Urbanizacion::create($data);
            $urbanizacion->save();
            if($request->ajax()){
                 return response()->json([
                    'mensaje' => 'ok',
                    'tipo'    => 'ok'
                ]);
            }
            //no es ajax
            return redirect()->route('bid.urbanizaciones.index');
          } catch (Exception $e) {
            Session::flash('error-message', 'El registro que intentó actualizar no se ha podido encontrar.');
            return redirect()->route('bid.urbanizaciones.index');
          }
    }

    public function show($id)
    {

    }

    public function getUrbanizaciones()
    {
        //Retorna la lista de urbanizaciones para repoblar los selects
        $urbanizacion = Urbanizacion::select(['urbanizacion.id', 'urbanizacion.nombre'])->orderBy('urbanizacion.nombre','asc')->get();
        return response()->json(['success' => true, 'urbanizaciones' => $urbanizacion]);
    }

    public function getUrbanizacion($id)
    {
      //abort(500);
        //Retorna los datos de la urbanizacion con $id
        $urbanizacion = Urbanizacion::findOrFail($id);
        return response()->json(['success' => true, 'urbanizacion' => $urbanizacion]);
    }

    public function edit($id)
    {
        try {
            $urbanizacion = Urbanizacion::findOrFail($id);
            return view('bid.urbanizacion.edit', compact('urbanizacion'));
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('error-message', 'El registro que intentó actualizar no se ha podido encontrar.');
            return redirect()->route('bid.urbanizaciones.index');
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            //
            $data = $request->all();

            //Se quita espacios de inicio y final y se convierte a mayusculas el array de datos
            $data['nombre'] = Str::upper(trim($data['nombre']));
            $data['descripcion'] = Str::upper(trim($data['descripcion']));
            $rules = array(
                'nombre'        => 'required|max:50|min:3|unique:urbanizacion,nombre,' . $id,
                'descripcion'   => 'max:250|min:10'
            );
            //Validacion usando la estructura mas antigua de Validator de laravel
            //Para poder validar correctamente los campos alterados con trim
            $v=Validator::make($data, $rules);
            if($v->fails()){
                //si la validacion falla armamos los mensajes de error para el ajax
                if($request->ajax()){
                    $retorno='';
                    $errores = $v->errors()->all();
                    foreach($errores as $errorcito) {
                        $retorno = $retorno . $errorcito;
                    }
                    return response()->json([
                        'mensaje' => $retorno,
                        'tipo'    => 'error'
                    ]);
                }else {
                    return redirect()->back()
                        ->withErrors($v->errors())
                        ->withInput($data);
                }
            }
            $urbanizacion = Urbanizacion::findOrFail($id);
            $urbanizacion->fill($data);
            $urbanizacion->save();
            if($request->ajax()){
                return response()->json([
                    'mensaje' => 'Registro actualizado correctamente.',
                    'tipo'    => 'ok'
                ]);
            }
            //no es ajax
            Session::flash('message', 'El registro perteneciente a la urbanización ' . $urbanizacion->nombre . ' con ID: ' . $urbanizacion->id . ' fue actualizado correctamente');
            return redirect()->route('bid.urbanizaciones.index');
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('error-message', 'El registro que intentó actualizar no se ha podido encontrar.');
            return redirect()->Createroute('bid.urbanizaciones.index');
        }
        catch(QueryException $e)
        {
            if($e->getCode()=='23505'){
                $mensaje='No se pudo guardar! el nombre de la urbanizacion esta duplicado, verifique los espacios al final e inicio del nombre';

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

    public function destroy($id, Request $request)
    {
        //
        try {
            //
            //abort(500);

            $urbanizacion = Urbanizacion::findOrFail($id);

            $mensaje = 'El registro perteneciente a la urbanización ' . $urbanizacion->nombre . ' con ID: ' . $urbanizacion->id . ' fue ELIMINADO correctamente';
            $urbanizacion->delete();

            if($request->ajax()){
                return response()->json([
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
            Session::flash('error-message', $errormsg);
            return redirect()->route('bid.urbanizaciones.index');
        }
    }


    public function editarModal($id){
      $urbanizacion = Urbanizacion::findOrFail($id);
      return view('bid.urbanizacion.modalediturbanizacion', compact('urbanizacion'));
    }
}
