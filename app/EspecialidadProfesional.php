<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class EspecialidadProfesional extends Model
{
    protected $table		= 'especialidadprofesional';
    protected $primaryKey 	= 'id';
    public $timestamps 		= true;
    protected $dateFormat 	= 'Y-m-d H:i:s';

    protected $dates = ['created_at','updated_at'];

    protected $fillable = [
        'profesional_id',
        'especialidad_id'
    ];
    public function especialidad(){
        return $this->hasOne('App\Especialidad', 'id', 'especialidad_id');
    }
    public function profesional(){
        return $this->belongsTo('App\Profesional', 'profesional_id', 'id');
    }
    
}
