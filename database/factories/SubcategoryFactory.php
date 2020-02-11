<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Subcategory::class, function (Faker $faker) {
    return [
        'name' => $faker->text($maxNbChars = 100),
        'price' => $faker->
        'stock' => $faker->
        'category_id' => $faker->
    ];
});
