<?php

namespace inais\Http\Controllers\Admin;

use inais\Http\Requests;
use inais\Http\Controllers\Controller;
use inais\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Route;
use yajra\Datatables\Datatables;



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
        $users = User::select(['id', 'first_name', 'last_name','email', 'password', 'created_at', 'updated_at', 'type']);
        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="users/'.$user->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Gestionar</a>';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at->format('Y/m/d');})
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('Y/m/d');})
            ->removeColumn('password')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin.users.create");

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
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();

        //return $redirect->route('admin.users.index');
        Session::flash('message', 'El registro perteneciente a ' . $user->full_name . ' fue actualizado');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        //User::destroy($id);

        $user -> delete();

        //se debe usar el metodo Set en vez de flash en caso de que se quiera persistir el mensaje.
        Session::flash('message', 'El registro perteneciente a ' . $user->full_name . ' fue eliminado');

        return redirect()->route('admin.users.index');
    }
}
