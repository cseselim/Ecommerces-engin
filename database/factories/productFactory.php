<?php

use Faker\Generator as Faker;
use App\Models\Category;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'category_id' => Category::all()->random()->id,
        'title' => $faker->text(100),
        'description' => $faker->realText(),
        'price' => random_int(100, 1000),
    ];
});
