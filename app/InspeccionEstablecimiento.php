<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspeccionEstablecimiento extends Model
{
    protected $table = 'inspecciones_establecimientos';

    protected $fillable = [
      'inspeccion_id',
      'establecimiento_id'
  ];

    function inspeccion()
    {
      return $this->belongsTo('App\Inspeccion','inspeccion_id','id');
    }

    function establecimiento()
    {
      return $this->belongsTo('App\Establecimiento','establecimiento_id','id');
    }
}
