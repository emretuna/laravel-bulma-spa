<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'owner_id' => factory(\App\User::class),
        'comment' => $faker->text,
        'star' => $faker->randomDigitNotNull,
        'vote' => $faker->randomElement(["positive","negative"]),
    ];
});
