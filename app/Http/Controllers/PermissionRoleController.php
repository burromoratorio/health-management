<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permission;
use App\PermissionRole;
use App\Module;
use App\Role;
use App\User;
use Session;
use Auth;
use DB;

class PermissionRoleController extends Controller
{
    public $module = 'seguridad';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $optRol = Role::orderBy('display_name')
                        ->pluck('display_name', 'id' );

        $optModulos = Module::orderBy('display_name')
                              ->pluck('display_name', 'id' );

        $permisos = [];
        $countReg = 0;
        $msg = '';
        $modulo = $request->get('optModulo');
        $rol    = $request->get('optRol');

        if ( $rol    === '' ) $msg .= "Debe seleccionar un rol. \n";
        if ( $modulo === '' ) $msg .= "Debe seleccionar un Módulo.";

        if ( $msg !== '' ) {
            Session::flash('message', $msg);
            Session::flash('alert-class', 'alert-danger');
        } else {

            if ( $rol != '' && $modulo != '' ) {
                $permisos = Permission::modulos($modulo)->with(['module'])->get();

                $asignados = PermissionRole::where('role_id', $rol)
                                            ->get();

                foreach ($permisos as $permiso) {
                    foreach ($asignados as $asignado) {
                        if ( $permiso->id == $asignado->permission_id ) $permiso = array_add( $permiso, 'role_id' , $asignado->role_id );
                    }
                }

                $countReg = count($permisos);
            }
        }

        return view('seguridad.list',[
            'registers' => $permisos,
            'total' => $countReg,
            'title' => $this->module,
            'optModulos' => $optModulos,
            'optRol' => $optRol,
            'RolSelected' => $rol,
            'ModuloSelected' => $modulo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //buscar todos los permisos por id de modulo
        $permisos = Permission::where("modulo_id", $request->get('module'))->get();
        //Obtengo datos del rol seleccionado
        $rol = Role::where('id', $request->get('role'))->first();

        //eliminar todos los permisos pertenecientes al módulo enviado
        foreach ($permisos as $key => $value) {
            $rol->detachPermission($value->id);
        }

        //asingo los nuevos permisos
        $recibido = $request->all();

        foreach ($recibido as $key => $value) {
            if ( $value === 'on' ) {
                if ( strpos($key, 'permiso_id_') !== false ){
                    $id = explode('permiso_id_', $key);

                    $rol->attachPermission($id[1]);
                }
            }
        }

        return redirect()->route('seguridad.index',[
                            'optModulo' => $request->get('module'),
                            'optRol' => $request->get('role')
                            ])
                            ->with('message', 'Permisos agregados correctamente')
                            ->with('alert-class', 'alert-success');

    }

}
