<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Estudio extends Model
{
    protected $table		= 'estudio';
    protected $primaryKey 	= 'id';
    public $timestamps 		= true;
    protected $dateFormat 	= 'Y-m-d H:i:s';

    protected $dates = ['created_at','updated_at','fecha'];

    protected $fillable = [
        'hc_id',
        'practica_medica_id',
        'user_id',
        'fecha',
        'resultado'
        ];
       
}
