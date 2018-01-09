<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\RoleUser;
use Session;
use DB;
use Hash;
use Auth;

class UserController extends Controller
{
    public $module = 'usuarios';
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ( Auth::user()->hasRole('super-user') ) {
            $registers = User::get();
        } else {
			$registers = User::get();
            //$registers = User::where('cliente_id', Auth::user()->cliente_id )->get();
        }

        $total = count($registers);
        $title = $this->module;

        return view('usuarios.list', compact('registers', 'total', 'title') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->getAuthUserRole();
        $usuarioRole = [];

        /*$optClientes = Cliente::where('activo', 1)
                           ->orderBy('razon_social')
                           ->pluck('razon_social', 'cliente_id' );*/
		$optClientes ="no";
        $title = $this->module;
        $description = 'Edición de un usuario.';

        return view('usuarios.create', compact('roles','usuarioRole', 'optClientes', 'title', 'description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $usuario = User::create($input);

        if ( is_null($request->input('roles')) ) {
            $usuario->attachRole('user');
        } else {
            foreach ( $request->input('roles') as $key => $value) {
                $usuario->attachRole($value);
            }
        }

        return redirect()->route('usuarios.index')
                            ->with('message', 'Usuario creado correctamente')
                            ->with('alert-class', 'alert-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);

        $usuarioRole = $usuario->roles->lists('id','id')->toArray();

        return view('usuarios.show', compact('usuario','roles','usuarioRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles   = $this->getAuthUserRole();
        $usuarioRole = $usuario->roles->lists('id','id')->toArray();

        /*$optClientes = Cliente::where('activo', 1)
                           ->orderBy('razon_social')
                           ->pluck('razon_social', 'cliente_id' );*/
		$optClientes	= "no";
        $title = $this->module;
        $description = 'Edición de un usuario.';

        return view('usuarios.edit', compact('usuario','roles','usuarioRole', 'optClientes', 'title', 'description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $usuario = User::findOrFail($id);
        $usuario->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();

        if ( !is_null($request->input('roles')) ) {
            foreach ( $request->input('roles') as $key => $value) {
                $usuario->attachRole($value);
            }
        }

        return redirect()->route('usuarios.index')
                            ->with('message', 'Usuario actualizado correctamente')
                            ->with('alert-class', 'alert-success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        $message = 'El usuario '. $usuario->name .' ha sido eliminado satisfactoriamente.';

        if ( $request->ajax() ) { return $message; }

        return redirect()->back()
                        ->with('message', $message)
                        ->with('alert-class', 'alert-success');
    }
    /**
     * Return a list of roles user can set
     */
    public function getAuthUserRole()
    {
        $user_role = RoleUser::where('user_id', Auth::user()->id )
                            ->orderBy('role_id')
                            ->first();

        $roles = Role::where('id', '>=', $user_role->role_id )->get();

        return $roles->lists('display_name','id');
    }
}
