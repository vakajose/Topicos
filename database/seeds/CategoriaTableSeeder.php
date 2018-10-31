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
        	'icon' => 'fa-map',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Alumbrado',
        	'color' => '#c68b53',
        	'icon' => 'fa-odnoklassniki',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Saneamiento',
        	'color' => '#c65353',
        	'icon' => 'fa-wikipedia-w',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Parques y jardines',
        	'color' => '#53c6c2',
        	'icon' => 'fa-child',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Alcantarillado',
        	'color' => '#a082b2',
        	'icon' => 'fa-car',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Infraestructura',
        	'color' => '#eaea00',
        	'icon' => 'fa-building',
        	'estado' => 'Activo'
        ]);
        Categoria::create([
        	'nombre' => 'Otros',
        	'color' => '#2a33e0',
        	'icon' => 'fa-camera',
        	'estado' => 'Activo'
        ]);

    }
}
