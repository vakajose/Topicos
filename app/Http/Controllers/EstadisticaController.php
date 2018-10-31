<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Categoria, Reclamo};



class EstadisticaController extends Controller
{
    
   public function show()
   {
   	$categorias = Categoria::all();
   	
   	return view('estadisticas.show');
   }
}
