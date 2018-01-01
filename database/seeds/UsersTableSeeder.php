<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create default admin
        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'user_level' => 0, 'password' => bcrypt('123'), 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'atio admin', 'email' => 'admin@atitonline.com', 'user_level' => 1, 'password' => bcrypt('123456'), 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'atio user', 'email' => 'user@atitonline.com', 'user_level' => 1, 'password' => bcrypt('123456'), 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")],
            ['name' => 'User', 'email'  => 'user@gmail.com', 'user_level'  => 1, 'password' => bcrypt('123'), 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")]
        ]);
    }
}
