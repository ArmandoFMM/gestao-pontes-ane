<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Role::class, function (Faker\Generator $faker) {

    return [
        'nome_role' => $faker->unique()->randomElement(['Admin','Gestor','Utilizador']),
        'descricao_role' => $faker->text
    ];
});
