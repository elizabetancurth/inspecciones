<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'inspecciones';

    function tipo()
    {
      return $this->belongsTo('App\InspeccionClasificacion','inspeccion_clasificacion_id','id');
    }
}
