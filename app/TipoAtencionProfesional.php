<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAtencionProfesional extends Model
{
    protected $table		= 'tipoatencionprofesional';
    protected $primaryKey 	= 'id';
    public $timestamps 		= false;
    protected $fillable = [
        'profesional_id',
        'tipo_atencion_id',
        'obs'
    ];
   public function tipoAtencion(){
        return $this->belongsTo('App\TipoAtencion', 'tipo_atencion_id', 'id');
    }

}
