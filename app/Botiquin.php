<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Botiquin extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'botiquines';

    protected $fillable = [
      'codigo',
      'tipo_botiquin_id'
    ];

    function tipo()
    {
      return $this->belongsTo('App\TipoBotiquin','tipo_botiquin_id','id');
    }

    function ubicacion()
    {
      return $this->belongsTo('App\Ubicacion','ubicacion_id','id');
    }

    function insumos_botiquin()
    {
      return $this->hasMany('App\InsumoBotiquin','botiquin_id', 'id');
    }
    
}
