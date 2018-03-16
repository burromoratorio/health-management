<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table|		= 'paciente';
    protected $primaryKey 	= 'id';
    public $timestamps 		= false;
    protected $fillable = [
        'dni',
        'nombre',
        'apellido'
    ];
    public function historiasClinicas(){
        return $this->hasMany('App\HistoriaClinica', 'id_paciente', 'id');
    }
    public function turnos(){
        return $this->hasMany('App\Turno', 'id_paciente', 'id');
    }

}
