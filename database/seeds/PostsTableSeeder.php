<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create default posts
        DB::table('posts')->insert([
            ['title' => 'HTML',   'slug' => strtolower('HTML'),   'user_id' => 1, 'category_id' => 1, 'content' => 'Content Post Content Post Content Post Content', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'CSS',    'slug' => strtolower('CSS'),    'user_id' => 1, 'category_id' => 2, 'content' => 'Content Post Content Post Content Post Content', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'PHP',    'slug' => strtolower('PHP'),    'user_id' => 1, 'category_id' => 1, 'content' => 'Content Post Content Post Content Post Content', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'JQUERY', 'slug' => strtolower('JQUERY'), 'user_id' => 2, 'category_id' => 2, 'content' => 'Content Post Content Post Content Post Content', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'Java',   'slug' => strtolower('Java'),   'user_id' => 2, 'category_id' => 2, 'content' => 'Content Post Content Post Content Post Content', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'Json',   'slug' => strtolower('Json'),   'user_id' => 2, 'category_id' => 3, 'content' => 'Content Post Content Post Content Post Content', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")]
        ]);
    }
}
