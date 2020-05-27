<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'taggable_id' => factory(\App\Page::class),
        'taggable_type' => $faker->word,
    ];
});
