<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ModuleRequest;
use App\Module;
use App\Menu;
use App\Permission;
use App\PermissionRole;
use App\Role;
use Session;

class ModuleController extends Controller
{
    public $module = 'módulos';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = Module::get();

        return view('modulos.list',[
            'registers' => $modulos,
            'total'     => $modulos->count(),
            'title'     => $this->module
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $title       = $this->module;
        $description = 'Creación de un nuevo módulo.';

        return view('modulos.create', compact('title', 'description'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(ModuleRequest $request)
    {
        $modulo = new Module;

        $modulo->name         = $request->name;
        $modulo->display_name = $request->display_name;
        $modulo->description  = $request->description;
        $modulo->icon         = trim($request->icon);

        $msg   = '';
        $class = '';

        // Si se creó correctamente el módulo,
        // creamos automaticamente los permisos CRUD para el mismo
        if ( $modulo->save() ){

            if ( !$permisos = Permission::createCRUD( $modulo->id, $modulo->name ) ){

                $msg   = 'No se han podido crear los permisos.';
                $class = 'alert-error';

            } else {

                $rol = Role::where('name', 'super-user')->first();

                foreach ($permisos as $id) {
                    $rol->attachPermission($id);
                }

                $msg = 'El módulo ha sido agregado satisfactoriamente';
            }
        }

        return redirect()
             ->back()
             ->with('message', $msg )
             ->with('alert-class', ($class == '' ? 'alert-success' : $class) );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
        $modulo = Module::findOrFail($id);

        return view('modulos.show', ['modulo'=> $modulo]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $modulo = Module::findOrFail($id);

        $title       = $this->module;
        $description = 'Edición de un módulo.';

        return view('modulos.edit', compact('modulo', 'title', 'description'));

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id, ModuleRequest $request)
    {
        $modulo = Module::findOrFail($id);

        $input = $request->all();

        $modulo->fill($input)->save();

        return redirect()
             ->back()
             ->with('message', 'El modulo ha sido actualizado satisfactoriamente' )
             ->with('alert-class', 'alert-success' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        $response = [ 'message' => '', 'status' => 400 ];

        $permisosRoles = PermissionRole::join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                                       ->where('permissions.modulo_id', $id)
                                       ->select('permission_role.*', 'permissions.modulo_id')
                                       ->get();

        if ( $permisosRoles->count() > 0 ) {

            foreach ($permisosRoles as $key => $value) {

                if ( !$permisosRol = PermissionRole::where("permission_id", $value->permission_id)
                                              ->where("role_id", $value->role_id)
                                              ->delete() ) {

                    $response['message'] .= 'No se han podido eliminar permisos asignados a roles.<br/>';

                }
            }
        }

        if ( is_null($menu = Menu::where('modulo_id', $id)
                                 ->orWhere('parent_id', $id)
                                 ->delete()) ) {

             $response['message'] .= 'No se ha podido eliminar el modulo del menu.<br/>';
        }

        if ( is_null($permisos = Permission::where('modulo_id', $id)->delete()) ) {

            $response['message'] .=  'No se han podido eliminar los permisos.';

        } else {

            $modulo = Module::findOrFail($id);

            if( !$modulo->delete() ) {

                $response['message'] .=  'No se ha podido eliminar el módulo.';

            }
        }

        if ( $response['message'] == '' ) {
            $response['message'] = 'El modulo ha sido eliminado correctamente';
            $response['status'] = 200;
        }

        return response()->json( $response['message'],  $response['status'] );
    }
}
