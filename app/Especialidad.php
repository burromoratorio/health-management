<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table|		= 'especialidad';
    protected $primaryKey 	= 'id';
    public $timestamps 		= false;
    protected $fillable = [
        'especialidad'
    ];
   
}
