<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Question::class, function (Faker $faker) {
    $userIds = App\User::pluck('id');

    return [
        'section' => $faker->uuid,
        'user' => $userIds->random(),
        'number' => $faker->numberBetween(),
        'question' => $faker->name,
        'answer' => $faker->name,
        'user_answer' => $faker->name,
        'success' => false,
        'answer_datetime' => $faker->dateTime,
    ];
});
