<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Airport;
use Faker\Generator as Faker;

$factory->define(Airport::class, function (Faker $faker) {
    return [
        'icao' => $faker->regexify('[A-Z0-9]{3,4}'),
        'name' => $faker->name(),
    ];
});
