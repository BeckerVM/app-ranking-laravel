<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => 'Azaleia',
        'phone' => '98345623',
        'description' => $faker->sentence($nbWords = 30, $variableNbWords = true),
        'seller_id' => 3,
        'category_id' => 1
    ];
});
