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

    function formato()
    {
      return $this->belongsTo('App\Formato','formato_inspeccion_id','id');
    }

    function idElemento()
    {
      if('inspeccion_clasificacion_id' === 2){
        $object = $this->belongsTo('App\Extintor','id_elemento','id');
        
        return $object;
      }
      else{
        return $this->belongsTo('App\Botiquin','id_elemento','id');
      }
      
      //Revisar que cuando no existan registros, busque sin problemas.
    }
    
}
