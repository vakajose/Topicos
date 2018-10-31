<?php

use Faker\Generator as Faker;
use App\User;
use App\Zona;
use App\Categoria;

$factory->define(App\Reclamo::class, function (Faker $faker) {
    
	$latitud = ['-17.771288','-17.775248', '-17.785271','-17.789367','-17.795102','-17.797679'];
	$longitud = ['-63.161216','-63.168818','-63.179706','-63.186631','-63.194559'];
	$user = User::pluck('id')->toArray();
	$zona = Zona::pluck('id')->toArray();
	$categoria = Categoria::pluck('id')->toArray();

    return [
        'titulo' =>$faker->title,
        'descripcion' => $faker->text($maxNbChars = 200),
        'latitud' => $faker->randomElement($latitud),
        'longitud' => $faker->randomElement($longitud),
        'votos' => $faker->randomDigit,
        'estado' => $faker->randomElement(['En Proceso','Recibido','Solucionado']),
        'user_id' => $faker->randomElement($user),
        'zona_id' => $faker->randomElement($zona),
        'categoria_id' => $faker->randomElement($categoria)
    ];
});
