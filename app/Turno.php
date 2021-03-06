<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Turno extends Model
{
    protected $table		= 'turno';
    protected $primaryKey 	= 'id';
    public $timestamps 		= true;
    protected $dateFormat 	= 'Y-m-d H:i:s';

    protected $dates = ['created_at','updated_at','fecha'];

    protected $fillable = [
        'paciente_id',
        'especialidad_profesional_id',
        'user_id',
        'fecha',
        'estado',
        'plus'
    ];
    public function paciente(){
        return $this->hasOne('App\Paciente', 'id', 'id_paciente');
    }
    public function especialidadProfesional(){
        return $this->hasOne('App\EspecialidadProfesional', 'id', 'id_especialidad_profesional');
    }
    
}
