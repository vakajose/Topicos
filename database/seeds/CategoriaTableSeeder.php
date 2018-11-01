<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
        	'nombre' => 'Calles',
        	'color' => '#41d352',
        	'icon' => 'road',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Alumbrado',
        	'color' => '#c68b53',
        	'icon' => 'lightbulb',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Saneamiento',
        	'color' => '#c65353',
        	'icon' => 'broom',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Parques y jardines',
        	'color' => '#53c6c2',
        	'icon' => 'leaf',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Alcantarillado',
        	'color' => '#a082b2',
        	'icon' => 'tint',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Infraestructura',
        	'color' => '#eaea00',
        	'icon' => 'building',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Otros',
        	'color' => '#2a33e0',
        	'icon' => 'question-circle',
        	'estado' => 'Activo'
        ]);

    }
}
