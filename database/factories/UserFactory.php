<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(\App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name('male'),
        'email' => $faker->email,
        'city' => $faker->text(5),
        'postal_code' => $faker->randomNumber(6),
        'country' => $faker->text(7),
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
        'password' => bcrypt('secret'), // secret
        'remember_token' => Str::random(10),
    ];
});
