<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaFormato extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'preguntas_formatos';

    protected $fillable = [
      'descripcion',
      'tipo_pregunta_id'
  ];

    function formato()
    {
      return $this->belongsTo('App\Formato','formato_inspeccion_id','id');
    }

    function tipo_pregunta()
    {
      return $this->belongsTo('App\TipoPregunta','tipo_pregunta_id','id');
    }
}
