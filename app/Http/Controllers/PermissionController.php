<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PermissionRequest;
use App\Permission;
use App\Module;
use Session;

class PermissionController extends Controller
{
    public $module = 'permisos';

    /**
     * Show list of permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $optModulos = Module::orderBy('display_name')
                            ->pluck('display_name', 'id' );

        $permisos = Permission::modulos($request->get('optModulo'))
                              ->with('module')
                              ->get();

        return view('permisos.list',[
            'registers'  => $permisos,
            'total'      => $permisos->count(),
            'title'      => $this->module,
            'optModulos' => $optModulos
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $optModulos = Module::orderBy('display_name')
                            ->pluck('display_name', 'id' );

        return view('permisos.create', [
            'title'       => $this->module,
            'description' => 'Creación de un nuevo permiso.',
            'optModulos'  => $optModulos
        ]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(PermissionRequest $request)
    {

        $permiso = new Permission;

        $permiso->name         = $request->name;
        $permiso->display_name = $request->display_name;
        $permiso->description  = $request->description;
        $permiso->modulo_id    = $request->modulo_id;

        $permiso->save();

        return redirect()->back()
                         ->with('message', 'El permiso ha sido agregado satisfactoriamente!')
                         ->with('alert-class', 'alert-success');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
        $permiso = Permission::findOrFail($id);

        return view('permisos.show', ['modulo'=> $modulo]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $optModulos = Module::orderBy('display_name')
                            ->pluck('display_name', 'id' );

        $permiso = Permission::findOrFail($id);

        return view('permisos.edit', [
            'title'           => $this->module,
            'description'     => 'Edición de un permiso.',
            'modulo'          => $permiso,
            'module_selected' => $permiso->modulo_id,
            'optModulos'      => $optModulos
        ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id, PermissionRequest $request)
    {
        $permiso = Permission::findOrFail($id);

        $input = $request->all();

        $permiso->fill($input)->save();

        return redirect()->back()
                         ->with('message', 'El permiso ha sido actualizado satisfactoriamente!')
                         ->with('alert-class', 'alert-success');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id, Request $request)
    {
        $permiso = Permission::findOrFail($id);

        $permiso->delete();

        $message = 'El permiso '. $permiso->name .' ha sido eliminado satisfactoriamente.';

        if ( $request->ajax() ) { return $message; }

        return redirect()->back()
                        ->with('message', $message)
                        ->with('alert-class', 'alert-success');
    }
}
