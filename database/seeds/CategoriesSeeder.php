<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Flores',
            'description' => 'Flores... ?'
        ]);
    }
}
