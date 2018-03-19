<?php

use Faker\Generator as Faker;

$factory->define(App\CaseImage::class, function (Faker $faker) {
    return [
        'image' => $faker->imageUrl
    ];
});
