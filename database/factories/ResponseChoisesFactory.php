<?php

use Faker\Generator as Faker;

$factory->define(App\ResponseChoise::class, function (Faker $faker) {
    return [
        'response' => $faker->sentence(15),
        'weight' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
