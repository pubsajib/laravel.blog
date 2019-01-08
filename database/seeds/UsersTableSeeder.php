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
            [
                'fname'         => 'Admin', 
                'email'         => 'admin@gmail.com', 
                'user_level'    => 0, 
                'is_active'     => 1, 
                'password'      => bcrypt('123456'), 
                'created_at'    => date("Y-m-d h:i:s"), 
                'updated_at'    => date("Y-m-d h:i:s")
            ],
            [
                'fname'         => 'Admin 2', 
                'email'         => 'email@gmail.com', 
                'user_level'    => 0, 
                'is_active'     => 1, 
                'password'      => bcrypt('123456'), 
                'created_at'    => date("Y-m-d h:i:s"), 
                'updated_at'    => date("Y-m-d h:i:s")
            ],
            [
                'fname'         => 'atio admin', 
                'email'         => 'admin@atitonline.com', 
                'user_level'    => 1, 
                'is_active'     => 1, 
                'password'      => bcrypt('123456'), 
                'created_at'    => date("Y-m-d h:i:s"), 
                'updated_at'    => date("Y-m-d h:i:s")
            ],
            [
                'fname'         => 'atio user', 
                'email'         => 'user@atitonline.com', 
                'user_level'    => 1, 
                'is_active'     => 1, 
                'password'      => bcrypt('123456'), 
                'created_at'    => date("Y-m-d h:i:s"), 
                'updated_at'    => date("Y-m-d h:i:s")
            ],
            [
                'fname'         => 'User', 
                'email'         => 'user@gmail.com', 
                'user_level'    => 1, 
                'is_active'     => 1, 
                'password'      => bcrypt('123456'), 
                'created_at'    => date("Y-m-d h:i:s"), 
                'updated_at'    => date("Y-m-d h:i:s")
            ]
        ]);
    }
}
