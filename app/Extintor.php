<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extintor extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'extintores';

    protected $fillable = [
        'codigo',
        'clasificacion',
        'capacidad',
        'altura',
        'estado'
    ];

    function clasificacion()
    {
      return $this->belongsTo('App\ClasificacionExtintor','clasificacion_extintor_id','id');
    }

    function ubicacion()
    {
      return $this->belongsTo('App\Ubicacion','ubicacion_id','id');
    }

    function fecha_ultima_recarga()
    {
      return $this->belongsTo('App\RecargaExtintor','id','extintor_id');
    }
}
