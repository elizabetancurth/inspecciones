<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsumoBotiquin extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'insumos_botiquin';

    function botiquin()
    {
      return $this->belongsTo('App\Botiquin','botiquin_id','id');
    }
    
    function inspecciones()
    {
      return $this->hasMany('App\InspeccionBotiquin','insumo_botiquin_id','id');
    }
}
