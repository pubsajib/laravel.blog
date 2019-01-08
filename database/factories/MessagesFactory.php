<?php
use Faker\Generator as Faker;
$factory->define(App\Message::class, function (Faker $faker) {
	$body = '';
	$contents = $faker->paragraphs(rand(1,2));
	if ($contents) {
		foreach ($contents as $content) {
			$body .= '<p>'. $content .'</p>';
		}
	}
    return [
        'email' => $faker->email,   
    	'subject' => $faker->sentence(),   
    	'body' => $body, 
    	'created_at' => date("Y-m-d h:i:s"), 
    	'updated_at' => date("Y-m-d h:i:s")
    ];
});
