<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'phone' => '983876532',
        'description' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'seller_id' => 1,
        'category_id' => 1
    ];
});
