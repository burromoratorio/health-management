<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
        'icon'
    ];

    //establecemos la relacion de uno a uno con el modelo Menu,
    //ya que un permiso puede pertenecer a un solo modulo
    public function menu(){
        return $this->belongsTo('App\Menu', 'id', 'modulo_id');
    }

    //establecemos las relacion de uno a muchos con el modelo permissions, ya que un modulo
    //puede tener varios  permisos
    public function permissions(){
        return $this->hasMany('App\Permission');
    }
}
