<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Create default admin
        DB::table('users')->insert([
        	['name' => 'Admin', 'email' => 'admin@gmail.com', 'user_level' => 0, 'password' => bcrypt('123') ],
	        ['name' => 'User', 'email'  => 'user@gmail.com', 'user_level'  => 1, 'password' => bcrypt('123') ]
        ]);

        DB::table('categories')->insert([
            ['name' => 'Category 1'],
            ['name' => 'Category 2'],
            ['name' => 'Category 3']
        ]);

        DB::table('tags')->insert([
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'PHP'],
            ['name' => 'JQUERY'],
            ['name' => 'Java Script'],
            ['name' => 'Json']
        ]);

        DB::table('posts')->insert([
        	['title' => 'HTML',   'slug' => strtolower('HTML'),   'user_id' => 1, 'category_id' => 1, 'content' => 'Content Post Content Post Content Post Content'],
        	['title' => 'CSS',    'slug' => strtolower('CSS'),    'user_id' => 1, 'category_id' => 2, 'content' => 'Content Post Content Post Content Post Content'],
            ['title' => 'PHP',    'slug' => strtolower('PHP'),    'user_id' => 1, 'category_id' => 1, 'content' => 'Content Post Content Post Content Post Content'],
            ['title' => 'JQUERY', 'slug' => strtolower('JQUERY'), 'user_id' => 2, 'category_id' => 2, 'content' => 'Content Post Content Post Content Post Content'],
            ['title' => 'Java',   'slug' => strtolower('Java'),   'user_id' => 2, 'category_id' => 2, 'content' => 'Content Post Content Post Content Post Content'],
        	['title' => 'Json',   'slug' => strtolower('Json'),   'user_id' => 2, 'category_id' => 3, 'content' => 'Content Post Content Post Content Post Content']
        ]);

        DB::table('comments')->insert([
            ['title' => 'HTML',   'post_id' => 1, 'user_id'=>1, 'is_approved'=> 1, 'body' => 'HTML comment content comment content content.'],
            ['title' => 'CSS',    'post_id' => 1, 'user_id'=>2, 'is_approved'=> 1, 'body' => 'CSS comment content content comment content content.'],
            ['title' => 'PHP',    'post_id' => 1, 'user_id'=>1, 'is_approved'=> 1, 'body' => 'PHP comment content content comment content content.'],
            ['title' => 'JQUERY', 'post_id' => 2, 'user_id'=>2, 'is_approved'=> 1, 'body' => 'JQUERY comment content content comment content content.'],
            ['title' => 'Java',   'post_id' => 2, 'user_id'=>1, 'is_approved'=> 1, 'body' => 'Java comment content content comment content content.'],
            ['title' => 'Json',   'post_id' => 3, 'user_id'=>2, 'is_approved'=> 1, 'body' => 'Json comment content comment content.']
        ]);

        DB::table('post_tag')->insert([
            ['post_id' => 1, 'tag_id' => 1],
            ['post_id' => 2, 'tag_id' => 2],
            ['post_id' => 3, 'tag_id' => 3],
            ['post_id' => 1, 'tag_id' => 4],
            ['post_id' => 2, 'tag_id' => 5],
            ['post_id' => 1, 'tag_id' => 6]
        ]);
    }
}
