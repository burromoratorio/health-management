<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAtencion extends Model
{
    protected $table		= 'tipoatencion';
    protected $primaryKey 	= 'id';
    public $timestamps 		= false;
    protected $fillable = ['tipo'];
  
}
