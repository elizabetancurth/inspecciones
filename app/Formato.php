<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'formatos_inspecciones';

    function preguntas()
    {
      return $this->hasMany('App\PreguntaFormato','formato_inspeccion_id', 'id');
    }
}
