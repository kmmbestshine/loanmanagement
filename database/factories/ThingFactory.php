<?php

use Faker\Generator as Faker;

$factory->define(App\Thing::class, function (Faker $faker) {
    return [
        'image' => [
        ],
        'properties' => [
            'name' => [
                'nob' => $faker->words(3, true),
                'nno' => $faker->words(3, true),
                'eng' => $faker->words(3, true),
            ],
            'name_definite' => [
                'nob' => $faker->words(3, true),
                'nno' => $faker->words(3, true),
                'eng' => $faker->words(3, true),
            ],
            'name_indefinite' => [
                'nob' => $faker->words(3, true),
                'nno' => $faker->words(3, true),
                'eng' => $faker->words(3, true),
            ],
        ]
    ];
});
