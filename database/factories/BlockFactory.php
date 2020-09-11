<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Block;
use Faker\Generator as Faker;

$factory->define(Block::class, function (Faker $faker) {
    return [
        "number" => $faker->numberBetween(1, 50),
	    "apartments_amount" => $faker->numberBetween(1, 50),
    ];
});

$factory->state(Block::class, 'block', function (Faker $faker) {
    return [
        "number" => (string) $faker->numberBetween(1, 50),
	    "apartments_amount" => $faker->numberBetween(1, 50),
    ];
});
