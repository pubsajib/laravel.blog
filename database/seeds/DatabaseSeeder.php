<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Create default admin
        DB::table('users')->insert([
        	[
        		'name' => 'Admin',
            	'email' => 'admin@gmail.com',
            	'user_level' => 0,
            	'password' => bcrypt('123')
            ],
	        [
	            'name' => 'User',
	            'email' => 'user@gmail.com',
	            'user_level' => 1,
	            'password' => bcrypt('123')
	        ]
        ]);

        DB::table('categories')->insert([
        	['name' => 'Category 1'],
        	['name' => 'Category 2'],
        	['name' => 'Category 3']
        ]);
    }
}
