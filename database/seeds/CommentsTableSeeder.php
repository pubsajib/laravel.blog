<?php
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder {
    public function run() {
        $body = '';
        $body .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium explicabo facilis molestias voluptatibus voluptate mollitia corporis, fuga, et quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium explicabo facilis molestias voluptatibus voluptate mollitia corporis, fuga, et quae. </p>';
        $body .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium e quae. </p>';
        // create default comments
        factory(App\Comment::class, 200)->create();
        DB::table('comments')->insert([
            ['title' => 'HTML',   'post_id' => 1, 'user_id'=>1, 'is_approved'=> 1, 'body' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'CSS',    'post_id' => 1, 'user_id'=>2, 'is_approved'=> 1, 'body' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'PHP',    'post_id' => 1, 'user_id'=>1, 'is_approved'=> 1, 'body' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'JQUERY', 'post_id' => 2, 'user_id'=>2, 'is_approved'=> 1, 'body' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'Java',   'post_id' => 2, 'user_id'=>1, 'is_approved'=> 1, 'body' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['title' => 'Json',   'post_id' => 3, 'user_id'=>2, 'is_approved'=> 1, 'body' => $body, 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")]
        ]);
    }
}
