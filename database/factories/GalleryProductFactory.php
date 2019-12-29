<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GalleryProduct;
use Faker\Generator as Faker;

$factory->define(GalleryProduct::class, function (Faker $faker) {
    return [
        'img_url' => 'https://ae01.alicdn.com/kf/H6c06927660e747f49c631dc884f86f1aI/VESONAL-2020-Summer-High-Quality-Genuine-Leather-Shoes-Men-Sandals-Handmade-Classic-For-Male-Soft-Beach.jpg_640x640.jpg',
        'product_id' => 9
    ];
});
