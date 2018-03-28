<?php

use Faker\Generator as Faker;

$factory->define(App\InstanceImage::class, function (Faker $faker) {
    return [
        'image' => $faker->imageUrl
    ];
});
