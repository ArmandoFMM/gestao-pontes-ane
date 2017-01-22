<?php


$factory->define(App\Provincia::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nome_provincia' => $faker->unique()->randomElement(['Maputo','Zambézia','Tete','Gaza','Manica','Nampula','Niassa','Inhambane','Sofala','Cabo Delgado']),
    ];
});
