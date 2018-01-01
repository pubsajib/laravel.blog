<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create default comments
        DB::table('comments')->insert([
            ['title' => 'HTML',   'post_id' => 1, 'user_id'=>1, 'is_approved'=> 1, 'body' => 'HTML comment content comment content content.', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'CSS',    'post_id' => 1, 'user_id'=>2, 'is_approved'=> 1, 'body' => 'CSS comment content content comment content content.', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'PHP',    'post_id' => 1, 'user_id'=>1, 'is_approved'=> 1, 'body' => 'PHP comment content content comment content content.', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'JQUERY', 'post_id' => 2, 'user_id'=>2, 'is_approved'=> 1, 'body' => 'JQUERY comment content content comment content content.', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'Java',   'post_id' => 2, 'user_id'=>1, 'is_approved'=> 1, 'body' => 'Java comment content content comment content content.', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'Json',   'post_id' => 3, 'user_id'=>2, 'is_approved'=> 1, 'body' => 'Json comment content comment content.', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")]
        ]);
    }
}
