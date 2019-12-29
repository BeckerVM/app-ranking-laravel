<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => ' Sandalias Sandal Slides',
        'description' => 'Sandalias Sandal Slides '. $faker->sentence($nbWords = 20, $variableNbWords = true),
        'description2' => $faker->sentence($nbWords = 60, $variableNbWords = true),
        'detail' => $faker->sentence($nbWords = 100, $variableNbWords = true),
        'price' => 85.99,
        'sold' => 55,
        'store_id' => 1
    ];
});
