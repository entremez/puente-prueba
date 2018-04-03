<?php

use Faker\Generator as Faker;

$factory->define(App\Provider::class, function (Faker $faker) {
    return [
        'rut' => $faker->numberBetween($min = 20000000, $max = 30000000),
        'dv_rut' => $faker->randomDigit,
        'name' => $faker->company,
        'address' => $faker->address,
        'web' => $faker->domainName,
        'logo' => $faker->imageUrl(640, 480,'cats'),
        'phone' => $faker->e164PhoneNumber,
        'description' => $faker->sentence(10),
        'long_description' => $faker->text,
        'approved' => false,
    ];
});
