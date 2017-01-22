<?php


$factory->define(App\Distrito::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nome_distrito' => $faker->unique()->randomElement(['Maputo',
                                                    'Beira',
                                                    'Matola',
                                                    'Xai-xai-',
                                                    'Chókwe',
                                                    'Chimoio',
                                                    'Nacala',
                                                    'Machanga',
                                                    'Satungira',
                                                    'Muchungué',
                                                    'Boane',
                                                    'Manhica',
                                                    'Macia',
                                                    'Manjacaze',
                                                    'Marracuene']),
           ];
});
