<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Link;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;



$factory->define(Link::class, function (Faker $faker) {
    $categoriesIDs = DB::table('categories')->pluck('id');
    return [
        'title' => substr($faker->sentence(2), 0, -1),
        'category_id' => $faker->randomElement($categoriesIDs),
        'confirmed' => true,
        'description' => $faker->paragraph,
    ];
});
