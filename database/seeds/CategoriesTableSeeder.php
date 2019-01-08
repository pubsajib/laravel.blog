<?php
use Illuminate\Database\Seeder;
class CategoriesTableSeeder extends Seeder {
    public function run() {
        // Create default categories
        factory(App\Category::class, 5)->create();
        DB::table('categories')->insert([
            ['name' => 'Engineer', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'Programmer', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'Teacher', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'Actor', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'Painter', 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
        ]);
    }
}
