<?php

use Illuminate\Database\Seeder;

class GalleryShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GalleryShop::class, 1)->create();
    }
}
