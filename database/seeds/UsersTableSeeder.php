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
                'fname'         => 'Admin 1', 
                'lname'         => 'Ahmed', 
                'email'         => 'admin@gmail.com', 
                'user_level'    => 0, 
                'is_active'     => 1, 
                'password'      => bcrypt('123456'), 
                'created_at'    => date("Y-m-d h:i:s"), 
                'updated_at'    => date("Y-m-d h:i:s")
            ],
            [
                'fname'         => 'MD.', 
                'lname'         => 'Admin 2', 
                'email'         => 'email@gmail.com', 
                'user_level'    => 0, 
                'is_active'     => 1, 
                'password'      => bcrypt('123456'), 
                'created_at'    => date("Y-m-d h:i:s"), 
                'updated_at'    => date("Y-m-d h:i:s")
            ],
            [
                'fname'         => 'atio', 
                'lname'         => 'admin', 
                'email'         => 'admin@atitonline.com', 
                'user_level'    => 1, 
                'is_active'     => 1, 
                'password'      => bcrypt('123456'), 
                'created_at'    => date("Y-m-d h:i:s"), 
                'updated_at'    => date("Y-m-d h:i:s")
            ],
            [
                'fname'         => 'atio', 
                'lname'         => 'user', 
                'email'         => 'user@atitonline.com', 
                'user_level'    => 1, 
                'is_active'     => 1, 
                'password'      => bcrypt('123456'), 
                'created_at'    => date("Y-m-d h:i:s"), 
                'updated_at'    => date("Y-m-d h:i:s")
            ],
            [
                'fname'         => 'User', 
                'lname'         => 'name', 
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
