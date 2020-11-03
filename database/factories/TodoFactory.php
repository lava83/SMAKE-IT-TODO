<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Todo;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Todo::class, function (Faker $faker) {

    $statusValues = ['open', 'closed'];

    return [
        'title' => $faker->title,
        'description' => $faker->text,
        'status' => $statusValues[rand(0, 1)],
        'user_id' => factory(App\Models\User::class)
    ];
});
