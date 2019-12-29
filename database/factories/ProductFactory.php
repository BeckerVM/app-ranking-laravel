<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => 'Big Size',
        'description' => 'Big Size '. $faker->sentence($nbWords = 10, $variableNbWords = true),
        'description2' => $faker->sentence($nbWords = 30, $variableNbWords = true),
        'detail' => $faker->sentence($nbWords = 30, $variableNbWords = true),
        'price' => 50.99,
        'sold' => 40,
        'store_id' => 1
    ];
});
