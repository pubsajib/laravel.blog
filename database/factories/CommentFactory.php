<?php
use Faker\Generator as Faker;
$factory->define(App\Comment::class, function (Faker $faker) {
	$body = '';
	$contents = $faker->paragraphs(rand(1,3));
	if ($contents) {
		foreach ($contents as $content) {
			$body .= '<p>'. $content .'</p>';
		}
	}
    return [
    	'title' => $faker->sentence(),   
    	'post_id' => rand(1,50), 
    	'user_id'=>rand(1,5), 
    	'is_approved'=> 1, 
    	'body' => $body, 
    	'created_at' => date("Y-m-d h:i:s"), 
    	'updated_at' => date("Y-m-d h:i:s")
    ];
});
