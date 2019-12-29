<?php

use Illuminate\Database\Seeder;

class ShopingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Store::class, 1)->create();
    }
}
