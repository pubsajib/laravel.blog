<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return ['name' => $faker->sentence(rand(2,4)), 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")];
});