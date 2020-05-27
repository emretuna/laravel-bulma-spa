<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'content' => $faker->paragraphs(3, true),
        'tags' => $faker->word,
    ];
});
