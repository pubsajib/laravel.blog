<?php
use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder {
    public function run() {
        $relations = 200;
        $posts = 150;
        $tags = 16;
        $postTags = [];
        for ($i=0; $i < $relations; $i++) { 
            $postTags[] = [
                'post_id' => rand(1,$posts), 
                'tag_id' => rand(1,$tags), 
                'created_at' => date("Y-m-d h:i:s"), 
                'updated_at' => date("Y-m-d h:i:s")
            ];
        }
        $postTags[] = ['post_id' => 1, 'tag_id' => 1, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")];
        $postTags[] = ['post_id' => 2, 'tag_id' => 2, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")];
        $postTags[] = ['post_id' => 3, 'tag_id' => 3, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")];
        $postTags[] = ['post_id' => 1, 'tag_id' => 4, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")];
        $postTags[] = ['post_id' => 2, 'tag_id' => 5, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")];
        $postTags[] = ['post_id' => 1, 'tag_id' => 6, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")];
        // create default post tag relations
        DB::table('post_tag')->insert($postTags);
    }
}
