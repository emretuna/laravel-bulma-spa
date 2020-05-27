<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Clinic;
use Faker\Generator as Faker;

$factory->define(Clinic::class, function (Faker $faker) {
    return [
        'owner_id' => factory(\App\User::class),
        'status' => $faker->randomElement(["pending",""]),
        'name' => $faker->name,
        'address' => $faker->word,
        'about' => $faker->word,
        'languages' => $faker->word,
        'location' => $faker->word,
        'country' => $faker->country,
    ];
});
