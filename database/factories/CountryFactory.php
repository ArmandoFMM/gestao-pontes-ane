<?php


$factory->define(App\Country::class, function (Faker\Generator $faker) {

    return [
        'nome_country' => $faker->unique()->randomElement(['Mocambique']),
    ];
});