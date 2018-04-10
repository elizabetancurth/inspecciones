<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{

    protected $primaryKey = 'id';
    protected $table = 'ubicaciones';

    protected $fillable = [
        'piso',
        'referencia',
        'estado',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function edificio()
    {
        return $this->belongsTo('App\Edificio');
    }
}
