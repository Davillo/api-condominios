<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\CondominiumBlock;
use Faker\Generator as Faker;

$factory->define(CondominiumBlock::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->state(CondominiumBlock::class, 'condominium_block', function (Faker $faker) {
    return [
       'condominium_id' => $faker->randomDigit,
       'block_id' => $faker->randomDigit,
    ];
});
