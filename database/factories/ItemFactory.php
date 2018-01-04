<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
    	'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'body' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'is_done' => $faker->boolean($chanceOfGettingTrue = 50),
        'priority' => $faker->boolean($chanceOfGettingTrue = 50)
    ];
});
