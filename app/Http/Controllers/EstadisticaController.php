<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    
   public function show()
   {
   	return view('estadisticas.show');
   }
}
