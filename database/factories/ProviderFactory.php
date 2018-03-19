<?php

use Faker\Generator as Faker;

$factory->define(App\Provider::class, function (Faker $faker) {
    return [
        'rut' => $faker->numberBetween($min = 20000000, $max = 30000000),
        'dv_rut' => $faker->randomDigit,
        'name' => $faker->word,
        'address' => $faker->address,
        'web' => $faker->domainName,
        'logo' => $faker->imageUrl,
        'description' => $faker->sentence(10),
        'long_description' => $faker->text,
        'approved' => false
    ];
});
