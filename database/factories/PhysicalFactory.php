<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Physical;
use Faker\Generator as Faker;

$factory->define(Physical::class, function (Faker $faker) {
    return [
        'athlete_id' => $faker->numberBetween($min = 1, $max = 25),
        'consent_form' => $faker->boolean($chanceOfGettingTrue = 80),
        'concussion_form' => $faker->boolean($chanceOfGettingTrue = 80),
        'evaluation_form' => $faker->boolean($chanceOfGettingTrue = 80),
        'exam_date' => $faker->date($format = 'Y-m-d', $max = 'now') ,
    ];
});
