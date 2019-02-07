<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Term::class, function (Faker $faker) {
    return [
        'name_jp' => $faker->word,
        'name_en' => $faker->word,
        'category' => $faker->word,
    ];
});
