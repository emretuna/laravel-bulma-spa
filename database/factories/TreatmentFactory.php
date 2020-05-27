<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Treatment;
use Faker\Generator as Faker;

$factory->define(Treatment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'icon' => $faker->word,
        'desc' => $faker->text,
        'duration' => $faker->word,
        'procedure' => $faker->text,
        'accommodation' => $faker->word,
        'transport' => $faker->word,
        'extra' => $faker->word,
        'assistance' => $faker->randomElement(["true","false"]),
        'guidance' => $faker->text,
        'doctors' => $faker->word,
    ];
});
