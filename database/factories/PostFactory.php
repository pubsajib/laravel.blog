<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
	$body = '';
	$title = $faker->sentence();
	$contents = $faker->paragraphs(10);
	if ($contents) {
		foreach ($contents as $content) {
			$body .= '<p>'. $content .'</p>';
		}
	}
    return [
        'title' => $title,
        'slug' => str_slug($title).'-'.time(),
        'user_id' => rand(1,5),
        'category_id' => rand(1,10),
        'content' => $body,
        'created_at'    => date("Y-m-d h:i:s"), 
        'updated_at'    => date("Y-m-d h:i:s")
    ];
});
