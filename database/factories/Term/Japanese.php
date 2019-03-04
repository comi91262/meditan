<?php

use App\Models\Term\Japanese;
use Faker\Generator as Faker;

$factory->define(
    Japanese::class,
    function (Faker $faker) {
        return [
            'term' => $faker->word,
            'department' => '放射線科',
        ];
    }
);

