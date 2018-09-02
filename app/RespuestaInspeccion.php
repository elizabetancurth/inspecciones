<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaInspeccion extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'respuestas_inspecciones';

    protected $fillable = [
      'respuesta',
      'observaciones',
      'estado'
  ];

    function pregunta()
    {
      return $this->belongsTo('App\PreguntaFormato','pregunta_formato_id','id');
    }

    function inspeccion()
    {
      return $this->belongsTo('App\Inspeccion','inspeccion_id','id');
    } 
}
