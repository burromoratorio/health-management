<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'modulo_id',
        'parent_id',
        'nivel'
    ];

    //establecemos las relacion de uno a uno con el modelo Module,
    //ya que un permiso puede pertenecer a un solo modulo
    public function module(){
        return $this->belongsTo('App\Module', 'modulo_id', 'id');
    }
}
