<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\CreateUserRequest;

class UsersController extends Controller
{

    function __construct()
    {
        /*$this->middleware([
            'auth',
            'roles:admin',['except' => ['edit','update']] //Pase de paramatros
        ]); *///array de middlewares
        $this->middleware('auth',['except' => ['show']]);
        $this->middleware('roles:admin',['except' => ['edit','update','show']]); 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');//Valor => llave
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->attach($request->roles);

        return redirect()->route('usuarios.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd(auth()->user());
        $user = User::findOrFail($id);

        $this->authorize('edit',$user); //Hacemos la llamada a la politica creada,
                                 //Se pasa el nombre de la funcion creada en la Politica y el usuario

        $roles = Role::pluck('display_name', 'id');//Valor => llave

        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {

        $user = User::findOrFail($id);

        $this->authorize('update',$user);
        
        $user->update($request->only('name','email'));

        $user->roles()->sync($request->roles); //INsercion ManyToMany

        return back()->with('info', 'Usuario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $this->authorize('destroy',$user);

        $user->delete();

        return back();
    }
}
