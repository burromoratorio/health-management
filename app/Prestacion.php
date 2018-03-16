<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Prestacion extends Model
{
    protected $table		= 'prestacion';
    protected $primaryKey 	= 'id';
    public $timestamps 		= true;
    protected $dateFormat 	= 'Y-m-d H:i:s';

    protected $dates = ['created_at','updated_at','inicio','fin'];

    protected $fillable = [
        'nombre',
        'profesional_id',
        'obrasocial_id',
        'monto',
        'inicio',
        'fin',
        'nro_prestador',
        'monto'
    ];
    public function profesional(){
        return $this->belongsTo('App\Profesional', 'profesional_id', 'id');
    }
    public function ordenes(){
        return $this->hasMany('App\Orden', 'prestacion_id', 'id');
    }
     public function obraSocial(){
        return $this->belongsTo('App\ObraSocial', 'obrasocial_id', 'id');
    }

    public static function especialidades() {
        return Profesional::with('especialidadprofesional',
                                 'especialidadprofesional.especialidad',
                                 
                           )->get();
    }

}
