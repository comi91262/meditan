<?php

use App\User;
use App\Models\Question;
use Faker\Generator as Faker;


$factory->define(
    Question::class,
    function (Faker $faker) {
        $userIds = User::pluck('id');

        return [
            'section' => $faker->uuid,
            'user' => $userIds->random(),
            'number' => $faker->numberBetween(),
            'question' => $faker->name,
            'language' => Config::get('constants.language.japanese'),
            'user_answer' => $faker->name,
            'success' => false,
            'answer_datetime' => $faker->dateTime,
        ];
    }
);
