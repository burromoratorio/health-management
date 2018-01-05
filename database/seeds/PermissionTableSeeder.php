<?php

use Illuminate\Database\Seeder;
use App\Module;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $modulos = Module::with('menu')->get();

        $permisos = [];

        foreach ( $modulos as $key => $value ) {

            if ( is_null( $value->menu->nivel ) ) {

                array_push ( $permisos,
                    [ 'name'         => $value->name.'-ver',
                      'display_name' => 'Muestra el módulo '.$value->display_name,
                      'description'  => 'Accede y lista los registros del módulo '.$value->display_name,
                      'modulo_id'    => $value->id ]
                );

            } else {

                array_push ( $permisos,
                    [ 'name'         => $value->name.'-ver',
                      'display_name' => 'Muestra el módulo '.$value->display_name,
                      'description'  => 'Permite acceder al módulo '. $value->display_name .' y ver el listado de registros del mismo',
                      'modulo_id'    => $value->id ],

                    [ 'name'         => $value->name.'-crear',
                      'display_name' => 'Crear nuevo registro',
                      'description'  => 'Permite la creación de un registro nuevo en el módulo '.$value->display_name,
                      'modulo_id'    => $value->id ],

                    [ 'name'         => $value->name.'-editar',
                      'display_name' => 'Editar registro',
                      'description'  => 'Permite editar un registro en el módulo '.$value->display_name,
                      'modulo_id'    => $value->id ],

                    [ 'name'         => $value->name.'-eliminar',
                      'display_name' => 'Eliminar registro',
                      'description'  => 'Permite eliminar un registro en el módulo '.$value->display_name,
                      'modulo_id'    => $value->id ]
                );

            }

        }

        foreach ( $permisos as $key => $value ) {
            Permission::firstOrCreate( $value );
        }

    }
}
