<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Question::class, function (Faker $faker) {
    return [
        'section' => $faker->uuid,
        'number' => $faker->numberBetween(),
        'question' => $faker->name,
        'success' => false,
        'success_datetime' => $faker->dateTime,
    ];
});
