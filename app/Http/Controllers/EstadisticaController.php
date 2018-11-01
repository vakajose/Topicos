<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Categoria, Reclamo};
use DateTimeZone;
use Datetime;




class EstadisticaController extends Controller
{

    
   public function show()
   {
   	date_default_timezone_set('America/La_Paz');
   	$categorias = Categoria::all();
   	$reclamos = Reclamo::all();   	
    $dataPie = $this->getDataForPie($categorias,'Reclamos');
   	$dataLine = $this->getDataForLine($categorias,$reclamos);
   	return view('estadisticas.show')->with(['dataPie'=>$dataPie,'dataLine'=>$dataLine]);
   }

   public function getDataForPie($categorias,$label)
   {
   	$labels = $categorias->pluck('nombre')->toArray();
   	$colors = $categorias->pluck('color')->toArray();
   	$datos = array();   	
   	foreach ($categorias as $cat ) {
   		$datos[] = $cat->reclamos->count();	
   	}
   	//set dataset
	$datasets=[[
        'label'=> $label,
        'data' => $datos,
        'backgroundColor' => $colors,
        'borderWidth' => 1
    ]];
    //set final data
    $data = [
        'labels' => $labels,
        'datasets'=> $datasets,
    ];

    return $data;
   }

   public function getDataForLine($categorias,$reclamos)
   {
   	//obtener rango de fecha
   	$rangoFecha = array();
   	$fechas = $reclamos->sortBy('fecha')->pluck('fecha');
   	$fromDate = new DateTime($fechas->first());
   	$toDate = new DateTime($fechas->last());
 	
   		while ($fromDate<=$toDate) {	
   		    $rangoFecha[] = $fromDate->format('Y-m-d');
   		    $fromDate->modify('+2 days');
   		}
  
   	//set datasets
   	$datasets = array();
   	foreach ($categorias as $cat) {

   		$label = $cat->nombre;
   		$backgroundColor = $cat->color;

   		//setear en 0 las fechas
   		$reclamos = $cat->reclamos;
   		for ($i = 0; $i < count($reclamos); $i++) {
   			$reclamo = $reclamos[$i];
   			$date = new DateTime($reclamo->fecha);
   			$reclamo['fecha'] = $date->format('Y-m-d');
   			$reclamos[$i] =$reclamo;
   		}
   		//creamos las coordenadas
   		$data = array();
   		$groups = $reclamos->groupBy('fecha');
   		$groups = $groups->sort();
   		$groups->each(function ($v,$k) use(&$data)
   		{		
   			$cord = ['x' => $k, 'y' =>count($v)];
   			$data[] =$cord;
   		});
   		
   		//creo el dataset y añaso al array
   		$dataset = [
   			'label'=>$label,
   			'backgroundColor' => $backgroundColor,
   			'fill' => false,
   			'data' => $data,
   		];
   		$datasets[] = $dataset;
   		
   	}

   	return ['labels' => $rangoFecha, 'datasets'=>$datasets];
  }
   

   
}
