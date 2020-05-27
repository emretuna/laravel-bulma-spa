<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Badge;
use Faker\Generator as Faker;

$factory->define(Badge::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'icon' => $faker->word,
        'desc' => $faker->word,
    ];
});
