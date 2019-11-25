<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Airport;
use App\Models\RwyConfigs;
use Faker\Generator as Faker;

$factory->define(RwyConfigs\RwyConfig::class, function (Faker $faker) {
    return [
        'airport_icao' => factory(Airport::class),
        'description' => $faker->sentence(),
    ];
});
