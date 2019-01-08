<?php
use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
    	'name' => $faker->word(), 
	    'created_at' => date("Y-m-d h:i:s"), 
	    'updated_at' => date("Y-m-d h:i:s")
	];
});
