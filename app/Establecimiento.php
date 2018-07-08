<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'establecimientos';

    protected $fillable = [
        'nombre',
        'estado'
    ];

    function ubicacion()
    {
      return $this->belongsTo('App\Ubicacion','ubicacion_id','id');
    }
}
