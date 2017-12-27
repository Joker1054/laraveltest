<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'is_done' => $faker->boolean($chanceOfGettingTrue = 50),
        'priority' => $faker->boolean($chanceOfGettingTrue = 50)
    ];
});
