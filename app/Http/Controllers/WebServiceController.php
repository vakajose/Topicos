<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reclamo;
use App\Foto;
class WebServiceController extends Controller
{
    public function getCategorias(){
    	$categorias = DB::table('categoria')->select('id','nombre')->get();
    	return response()->json($categorias);
    }
    public function getcategoriacode(){
        $r = DB::table('categoria')->select('created_at')->get();
        $code = 0;
        foreach ($r as $rr) {
            $code = $code+($rr->created_at[strlen($rr->created_at)-1] + $rr->created_at[strlen($rr->created_at)-2]+1);
        }
        dd($code);
    }

    	
    public function crearReclamo(){
        return json_encode(['status' => $this->enviarreclamo($_POST)]);
    }
    public function enviarreclamo(){
        $reclamo = $this->crearReclamoI($_POST['titulo'],$_POST['descripcion'],$_POST['latitud'],$_POST['longitud'],'0','Recibido','2','1',$_POST['categoria_id']);
        $this->crearFoto($reclamo->id,$_POST['image1']);
        $this->crearFoto($reclamo->id,$_POST['image2']);
        $this->crearFoto($reclamo->id,$_POST['image3']);
        return '200';
    }
    private function crearReclamoI($titulo, $descripcion, $latitud, $longitud, $votos,$estado,$user_id,$zona_id,$categoria_id){
      return  Reclamo::create([
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'latitud' => $latitud,
            'longitud' => $longitud,
            'votos' => $votos,
            'estado' => $estado,
            'user_id' => $user_id,
            'zona_id' => $zona_id,
            'categoria_id' => $categoria_id
        ]);
    }
    private function crearFoto($reclamoid, $imagedata){
        if($imagedata != ""){
            $imageName = str_random(30).'.jpg';
            $path = 'images/'.$imageName;
            \File::put(public_path().'/images/' . $imageName, base64_decode($imagedata));
            Foto::create([
                'path' => $path,
                'reclamo_id' => $reclamoid
            ]);
        }
    }	
}
