<?php

/** @var Factory $factory */

use App\Models\Athlete;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Athlete::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'sex' => $faker->randomElement($array = ['m', 'f']),
        'grad_year' => $faker->randomElement($array = [2020, 2021, 2022, 2023, 2024]),
        'dob' => $faker->date('Y-m-d'),
    ];
});
