<?php

use App\Models\Term;
use App\Models\Term\English;
use App\Models\Term\Japanese;
use Faker\Generator as Faker;


$factory->define(
    Term::class,
    function (Faker $faker) {
        return [
            'japanese_term_id' => function () {
                return factory(Japanese::class)->create()->id;
            },
            'english_term_id' => function () {
                return factory(English::class)->create()->id;
            },
        ];
    }
);
