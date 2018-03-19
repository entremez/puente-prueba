<?php

use Faker\Generator as Faker;

$factory->define(App\Instance::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence(10),
        'long_description' => $faker->text,
        'default_image' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
