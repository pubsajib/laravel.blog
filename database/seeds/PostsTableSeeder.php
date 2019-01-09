<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {
    public function run() {
        $body = '';
        $body .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium explicabo facilis molestias voluptatibus voluptate mollitia corporis, fuga, et quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium explicabo facilis molestias voluptatibus voluptate mollitia corporis, fuga, et quae. </p>';
        $body .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium explicabo facilis molestias voluptatibus voluptate mollitia corporis, fuga, et quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium explicabo facilis molestias voluptatibus voluptate mollitia corporis, fuga, ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium explicabo facilis molestias voluptatibus voluptate mollitia corporis, fuga, et quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium explicabo facilis molestias voluptatibus voluptate mollitia corporis, fuga, et quae. </p>';
        $body .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium e quae. </p>';
        // create default posts
        factory(App\Post::class, 150)->create();
        DB::table('posts')->insert([
            ['title' => 'HTML',   'slug' => strtolower('HTML'),   'user_id' => 1, 'category_id' => 1, 'content' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'CSS',    'slug' => strtolower('CSS'),    'user_id' => 1, 'category_id' => 2, 'content' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'PHP',    'slug' => strtolower('PHP'),    'user_id' => 1, 'category_id' => 1, 'content' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'JQUERY', 'slug' => strtolower('JQUERY'), 'user_id' => 2, 'category_id' => 2, 'content' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'Java',   'slug' => strtolower('Java'),   'user_id' => 2, 'category_id' => 2, 'content' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'Json',   'slug' => strtolower('Json'),   'user_id' => 2, 'category_id' => 3, 'content' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")]
        ]);
    }
}
