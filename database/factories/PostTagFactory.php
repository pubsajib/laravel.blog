<?php

use Faker\Generator as Faker;

$factory->define(App\PostTag::class, function (Faker $faker) {
    return ['post_id' => rand(1,50), 'tag_id' => rand(1,15), 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")];
});
