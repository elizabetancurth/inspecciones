<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaInspeccion extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'respuestas_inspecciones';

    function pregunta()
    {
      return $this->belongsTo('App\PreguntaFormato','pregunta_formato_id','id');
    }
}
