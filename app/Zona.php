<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
   protected $table ="zona";
   protected $fillable = [
        'nombre'
    ];
    public function coordenadas(){
    	 return $this->hasMany('App\Coordenada');

    }
    public function reclamos(){
    	 return $this->hasMany('App\Reclamo');

    }
}
