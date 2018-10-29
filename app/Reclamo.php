<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table ="reclamo";
   protected $fillable = [
        'titulo', 'descripcion','latitud','longitud','votos','estado', 'user_id','zona_id','categoria_id'
    ];
    public function fotos(){
    	 return $this->hasMany('App\Foto');

    }
}
