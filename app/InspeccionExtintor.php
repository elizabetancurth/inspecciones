<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspeccionExtintor extends Model
{
    protected $table = 'inspecciones_extintores';

    protected $fillable = [
      'inspeccion_id',
      'extintor_id'
  ];

    function inspeccion()
    {
      return $this->belongsTo('App\Inspeccion','inspeccion_id','id');
    }

    function extintor()
    {
      return $this->belongsTo('App\Extintor','extintor_id','id');
    }
}
