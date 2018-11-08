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
        	'icon' => 'fas fa-road',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Alumbrado',
        	'color' => '#c68b53',
        	'icon' => 'fas fa-lightbulb',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Saneamiento',
        	'color' => '#c65353',
        	'icon' => 'fas fa-broom',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Parques y jardines',
        	'color' => '#53c6c2',
        	'icon' => 'fas fa-leaf',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Alcantarillado',
        	'color' => '#a082b2',
        	'icon' => 'fas fa-tint',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Infraestructura',
        	'color' => '#eaea00',
        	'icon' => 'fas fa-building',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Otros',
        	'color' => '#2a33e0',
        	'icon' => 'fas fa-question-circle',
        	'estado' => 'Activo'
        ]);

    }
}
