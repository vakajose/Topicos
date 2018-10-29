<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenada extends Model
{
    protected $table ="coordenada";
   protected $fillable = [
        'latitud', 'longitud', 'zona_id'
    ];
}
