<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RolRequest;
use App\Role;
use Session;

class RolController extends Controller
{
    public $module = 'roles';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();

        $countReg = count($roles);

        return view('roles.list',[
            'registers' => $roles,
            'total' => $countReg,
            'title' => $this->module
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('roles.create', [
            'title' => $this->module,
            'description' => 'Creación de un nuevo rol.'
        ]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(RolRequest $request)
    {
        $rol = new Role;

        $rol->name = $request->name;
        $rol->display_name = $request->display_name;
        $rol->description = $request->description;

        $rol->save();

        Session::flash('flash_message', 'El rol ha sido agregado satisfactoriamente!');

        return redirect()->back();
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
        $rol = Role::findOrFail($id);

        return view('roles.show', ['rol'=> $rol]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $rol = Role::findOrFail($id);

        return view('roles.edit', [
            'title' => $this->module,
            'description' => 'Edición de un rol.',
            'rol'=> $rol]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id, RolRequest $request)
    {
        $rol = Role::findOrFail($id);

        $input = $request->all();

        $rol->fill($input)->save();

        Session::flash('flash_message', 'El rol ha sido actualizado satisfactoriamente!');

        return redirect()->back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id, Request $request)
    {
        $rol = Role::findOrFail($id);

        $rol->delete();

        $message = 'El rol '. $rol->name .' ha sido eliminado satisfactoriamente.';

        if ( $request->ajax() ) { return $message; }

        return redirect()->back()
                        ->with('message', $message)
                        ->with('alert-class', 'alert-success');
    }
}
