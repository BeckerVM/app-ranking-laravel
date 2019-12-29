<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GalleryProduct;
use Faker\Generator as Faker;

$factory->define(GalleryProduct::class, function (Faker $faker) {
    return [
        'img_url' => 'https://ae01.alicdn.com/kf/H41be822c97dc4baca84d11f5e40083a8N/Big-Size-Men-Sneakers-Fashion-Men-Casual-Shoes-Leather-Breathable-Man-Shoes-Lightweight-Male-Shoes-Adult.jpg',
        'product_id' => 3
    ];
});
