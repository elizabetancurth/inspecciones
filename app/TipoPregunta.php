<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPregunta extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'tipos_preguntas';

    function opcion_respuesta()
    {
      return $this->belongsTo('App\OpcionRespuesta','id','tipo_pregunta_id');
    }
}
