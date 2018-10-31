<?php

use Illuminate\Database\Seeder;
use App\Zona;
use App\Reclamo;

class ReclamoZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zona::create(['nombre' => 'Zona 1']);
        Zona::create(['nombre' => 'Zona 2']);
        Zona::create(['nombre' => 'Zona 3']);

        factory(App\Reclamo::class, 12)->create();

    }
}
