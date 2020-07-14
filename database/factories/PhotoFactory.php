<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'photo_title' => $faker->name,
        'photo_url' => $faker->unique()->safeEmail,
        'user_id' => factory(\App\User::class)
    ];
});
