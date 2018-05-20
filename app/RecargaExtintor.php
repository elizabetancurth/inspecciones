<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecargaExtintor extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'recargas_extintores';

    protected $fillable = [
      'fecha_recarga',
      'fecha_vencimiento',
      'extintor_id'
  ];
    
    function extintor()
    {
      return $this->belongsTo('App\Extintor','extintor_id','id');
    }
}
