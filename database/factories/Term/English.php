<?php

use App\Models\Term\English;
use Faker\Generator as Faker;

$factory->define(
    English::class,
    function (Faker $faker) {
        return [
            'term' => $faker->word,
            'department' => '放射線科',
        ];
    }
);

