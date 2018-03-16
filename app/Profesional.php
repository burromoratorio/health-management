<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Profesional extends Model
{
    protected $table		= 'profesional';
    protected $primaryKey 	= 'id';
    public $timestamps 		= true;
    protected $dateFormat 	= 'Y-m-d H:i:s';

    protected $dates = ['created_at','updated_at'];

    protected $fillable = [
        'dni',
        'nombre',
        'apellido',
        'marticula'
    ];
    public function especialidadprofesional(){
        return $this->hasMany('App\EspecialidadProfesional', 'profesional_id', 'id');
    }
    public function prestaciones(){
        return $this->hasMany('App\Prestacion', 'profesional_id', 'id');
    }
    public function tiposAtencionProfesional(){
        return $this->hasMany('App\TipoAtencionProfesional', 'profesional_id', 'id');
    }
    public static function atenciones() {
        return Profesional::with('tiposAtencionProfesional',
                                 'tiposAtencionProfesional.tipoAtencion',
                                 
                           )->get();
    }

}
