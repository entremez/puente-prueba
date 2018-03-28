<?php

use Faker\Generator as Faker;

$factory->define(App\Instance::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'company_name' => $faker->company,
        'description' => $faker->sentence(10),
        'long_description' => $faker->text,
    ];
});
