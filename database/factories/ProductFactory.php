<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Doritos', 'Oriental Super Ring', 'Chanberry', 'Bluberry', 'Lays', 'Muruku', 'Indomilk', 'SgMilk']),
        'category_id' => \App\Category::all()->random(),
        'image' => $faker->randomElement([
                'banana-2019085304.jpg',
                'bing-cherry-2019124401.jpg',
                'boysenberries-2019083407.jpg',
                'grape-2019114258.jpg',
                'grape-2019114545.jpg',
                'grape-2019142358.jpg',
        ])
    ];
});
