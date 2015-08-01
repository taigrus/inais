<?php

namespace inais\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use inais\Rol;
use inais\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Route;
use PhpSpec\Listener\BootstrapListener;
use yajra\Datatables\Datatables;
use Illuminate\Database\Eloquent\ModelNotFoundException;




class UsersController extends Controller
{
    /*
     Esto para dd($this->request->all()); del store
     protected $request;

     public function __construct(Request $request){
         $this->request = $request;
     }

      * Display a listing of the resource.
      *
      * @return Response
      */


    public function index()
    {
        //$users=User::paginate();
        //return view('admin.users.index',compact('users'));
        return view('admin.users.index');

    }


    public function anyData()
    {
        //return Datatables::of(User::select('*'))->make(true);
        $users = User::select(['users.id', 'users.first_name', 'users.last_name','users.email', 'users.password', 'users.created_at', 'users.updated_at', 'users.type_id']);
        //$users = User::join('roles', 'users.id'. '=', 'roles.id')->select(['users.first_name', 'users.last_name','users.email', 'users.password', 'users.created_at', 'users.updated_at', 'users.type_id', 'roles.descripcion']);
        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="users/'.$user->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Operaciones</a>';
            })
            ->editColumn('users.updated_at', function ($user) {
                return $user->updated_at->format('Y/m/d');})
            ->editColumn('users.created_at', function ($user) {
                return $user->created_at->format('Y/m/d');})
            ->removeColumn('users.password')
            ->make(true);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles_options = \DB::table('roles')->orderBy('id', 'asc')->lists('descripcion','id');
        return view("admin.users.create", array('roles_options' => $roles_options));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CreateUserRequest $request)
    {
        //Obtencion y alidacion de los datos con las reglas que estan en el request creado CreateUserRequest
        $user = User::create($request->all());
        $user->save();
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //$users = User::join('roles', 'users.id'. '=', 'roles.id')->select(['users.first_name', 'users.last_name','users.email', 'users.password', 'users.created_at', 'users.updated_at', 'users.type_id', 'roles.descripcion'])->find(1)->roles;
        $users=Rol::find(1)->users;
        foreach ($users as $user){
            echo $user->descripcion;
        }
        $rol=User::findOrFail(1)->rol;
        echo $rol->descripcion;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        try
        {
            $user = User::findOrFail($id);
            $roles_options = \DB::table('roles')->orderBy('id', 'asc')->lists('descripcion','id');
            return view('admin.users.edit', compact('user'), array('roles_options' => $roles_options));
        }
// catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            dd(get_class_methods($e)); // lists all available methods for exception object
            dd($e);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\EditUserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->fill($request->all());
            $user->save();

            //return $redirect->route('admin.users.index');
            Session::flash('message', 'El registro perteneciente a ' . $user->full_name . ' fue actualizado');
            return redirect()->route('admin.users.index');
        }
        catch(ModelNotFoundException $e)
        {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', 'El registro que intentó actualizar no se ha podido encontrar.');
            return redirect()->route('admin.users.index');
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
        try
        {
            $user = User::findOrFail($id);

            //User::destroy($id);

            $user -> delete();

            //se debe usar el metodo Set en vez de flash en caso de que se quiera persistir el mensaje.
            Session::flash('message', 'El registro perteneciente a ' . $user->full_name . ' fue eliminado');

            return redirect()->route('admin.users.index');
        }
// catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            Session::flash('error-message', 'El registro que intentó eliminar no se ha podido encontrar.');
            return redirect()->route('admin.users.index');
            //return 'No se encontro el usuari que quiere eliminar, presione atras en el navegador';
        }

    }

}
