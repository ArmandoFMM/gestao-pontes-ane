<?php


$factory->define(App\Estrada::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nome_estrada' => $faker->unique()->randomElement(['EN1','EN4','EN6','N324']),
    ];
});
