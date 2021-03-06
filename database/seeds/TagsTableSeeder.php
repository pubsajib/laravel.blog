<?php
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder {
    public function run() {
        // create default tags
        factory(App\Tag::class, 10)->create();
        DB::table('tags')->insert([
            ['name' => 'HTML', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'CSS', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'PHP', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'JQUERY', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'Java Script', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'Json', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")]
        ]);
    }
}
