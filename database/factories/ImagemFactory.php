<?php


$factory->define(App\Imagem::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nome_imagem' => $faker->randomElement(['pic1.jpg','pic2.jpg','pic3.jpg','pic4.jpg']),
        'posicao' => $faker->randomElement(['Sul','Norte','Este','Oeste','Cima','Baixo']),
    ];
});
