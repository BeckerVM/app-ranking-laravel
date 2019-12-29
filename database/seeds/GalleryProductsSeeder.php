<?php

use Illuminate\Database\Seeder;

class GalleryProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GalleryProduct::class, 1)->create();
    }
}
