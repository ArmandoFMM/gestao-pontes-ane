<?php

/*
|--------------------------------------------------------------------------
| Ponte Model Factory
|--------------------------------------------------------------------------
|
| Here you may define all of your Ponte factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default user should look.
|
*/

$factory->define(App\Ponte::class, function (Faker\Generator $faker) {

    return [
        'nome_ponte' => $faker->unique()->name,
        'ano_construcao' => $faker->randomElement([2000,2004,1997,1994,2008]),
        'lat_inicio' => $faker->latitude,
        'lng_inicio' => $faker->latitude,
        'lat_fim' => $faker->latitude,
        'lng_fim' => $faker->latitude,
        'tipo_obstaculo'=> $faker->randomElement(['Rio','Corrente']),
        'local_obstaculo' => $faker->randomElement(['Por Baixo']),
        'imagem' => $faker->randomElement(['ponte.jpg','ponte1.jpg','ponte2.jpeg','ponte3.jpeg','ponte4.jpeg','ponte5.jpg']),
        'estado_ponte' => $faker->randomElement(['Bom','Degradada']),
        'tipo_id' => $faker->numberBetween(1,4),
        'estrada_id' => $faker->numberBetween(1,4)
    ];
});