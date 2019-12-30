<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GalleryShop;
use Faker\Generator as Faker;

$factory->define(GalleryShop::class, function (Faker $faker) {
    return [
        'img_url' => 'https://scontent.faqp2-1.fna.fbcdn.net/v/t1.15752-9/81423540_1001183673566818_4025550607476588544_n.png?_nc_cat=106&_nc_ohc=ZC1IH2ynEHIAQlPmfurjmja-GDeZPg375SB9t3_W2r2GfYS4bNe-Ex6UA&_nc_ht=scontent.faqp2-1.fna&oh=37f4a1dfc2707b4616fb6de0fa537206&oe=5E9EDFE1',
        'store_id' => 3
    ];
});
