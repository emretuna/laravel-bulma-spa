<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'desc' => $faker->text,
        'country' => $faker->country,
        'city' => $faker->city,
        'features' => $faker->word,
    ];
});
