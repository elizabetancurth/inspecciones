<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspeccionBotiquin extends Model
{
    protected $table = 'inspecciones_insumos_botiquines';

    protected $fillable = [
      'inspeccion_id',
      'insumo_botiquin_id'
  ];

    function inspeccion()
    {
      return $this->belongsTo('App\Inspeccion','inspeccion_id','id');
    }

    function insumo_botiquin()
    {
      return $this->belongsTo('App\InsumoBotiquin','insumo_botiquin_id','id');
    }
}
