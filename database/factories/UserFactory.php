<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => 'Admin2019',
        'username' => 'Admin2019',
        'password' => Hash::make('12345'), // password
        'rol' => 'admin',
        'state' => 'activo',
        'img_profile' => $faker->imageUrl($width = 480, $height = 480, "people")
    ];
});
