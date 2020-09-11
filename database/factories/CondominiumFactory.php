<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Block;
use App\Models\Condominium;
use Faker\Generator as Faker;

$factory->define(Condominium::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email
    ];
});

$factory->state(Condominium::class, 'condominium', function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email
    ];
});

