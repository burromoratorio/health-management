<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Orden extends Model
{
    protected $table		= 'orden';
    protected $primaryKey 	= 'id';
    public $timestamps 		= true;
    protected $dateFormat 	= 'Y-m-d H:i:s';

    protected $dates = ['created_at','updated_at','fecha'];

    protected $fillable = [
        'prestacion_id',
        'fecha',
        'nro_orden',
        'codigo_autorizacion'
    ];
    public function prestacion(){
        return $this->hasOne('App\Prestacion', 'id', 'prestacion_id');
    }
   
}
