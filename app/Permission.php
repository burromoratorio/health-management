<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'modulo_id'
    ];

    //establecemos las relacion de muchos a muchos con el modelo Role, ya que un permiso
    //lo pueden tener varios roles y un rol puede tener varios permisos
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    //establecemos las relacion de uno a uno con el modelo Module,
    //ya que un permiso puede pertenecer a un solo modulo
    public function module(){
        return $this->belongsTo('App\Module', 'modulo_id');
    }

    public function scopeModulos($query, $module ){
        if ( $module != '' ) {
            return $query->where('modulo_id', $module);
        }
    }

    public static function createCRUD( $modulo_id, $nombre ){
        if ( $modulo_id != '' ) {
            $permission = [
            	[
            		'name' => $nombre.'-ver',
            		'display_name' => 'Ver '.ucfirst(trans($nombre)),
            		'description' => 'Permive visualizar el módulo '.$nombre,
            		'modulo_id' => $modulo_id
            	],
            	[
            		'name' => $nombre.'-crear',
            		'display_name' => 'Crear '.ucfirst(trans($nombre)),
            		'description' => 'Permite crear un nuevo registro en el módulo '.$nombre,
            		'modulo_id' => $modulo_id
            	],
            	[
            		'name' => $nombre.'-eliminar',
            		'display_name' => 'Eliminar '.ucfirst(trans($nombre)),
            		'description' => 'Permite eliminar un registro en el módulo '.$nombre,
            		'modulo_id' => $modulo_id
            	],
            	[
            		'name' => $nombre.'-editar',
            		'display_name' => 'Editar '.ucfirst(trans($nombre)),
            		'description' => 'Permite editar un registro en el módulo '.$nombre,
            		'modulo_id' => $modulo_id
            	]
            ];

            $result = [];
            foreach ($permission as $key => $value) {
            	if ( $id = Permission::insertGetId($value) ){
                    array_push($result, $id);
                } else {
                    return false;
                }
            }

            if ( count( $result ) > 0 ){
                return $result;
            }else {
                return false;
            }
        }
    }
}
