<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'edificios';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
