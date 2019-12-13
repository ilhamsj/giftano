<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Doritos', 'Oriental Super Ring', 'Chanberry', 'Bluberry', 'Lays', 'Muruku', 'Indomilk', 'SgMilk']),
        'category_id' => \App\Category::all()->random(),
        'image' => $faker->randomElement([
            env('APP_URL').'images/bing-cherry-2019124401.jpg',
            env('APP_URL').'images/chanberry-2019030251.jpg',
            env('APP_URL').'images/chanberry-2019030330.jpg',
            env('APP_URL').'images/doritos-2019080627.jpg',
            env('APP_URL').'images/oriental-super-ring-2019080641.jpg',
            env('APP_URL').'images/oriental-super-rong-2019090740.jpg',
            env('APP_URL').'images/sgmilk-2019080544.jpg',
        ])
    ];
});
