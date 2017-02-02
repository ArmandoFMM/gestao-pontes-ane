<?php


$factory->define(App\TipoDePonte::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'designacao_tipo' => $faker->unique()->randomElement(['Pedonal','Flutuante','Bailey','Teste']),
        'descricao_tipo' => 'Esta é uma breve descricao deste tipo de ponte',
    ];
});
