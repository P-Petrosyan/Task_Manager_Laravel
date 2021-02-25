<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 2; $i++) { 
        	DB::table('users')->insert([
	            'name' => Str::random(10),
	            'email' => "admin$i@admin.com",
	            'password' => bcrypt('12345678'), // Hash::make('password'),
	            'is_manager' => 1,

	        ]);
        }
        for ($i=1; $i <= 2; $i++) { 
        	DB::table('users')->insert([
	            'name' => Str::random(5),
	            'email' => "stnd$i@stnd.com",
	            'password' => bcrypt('12345678'),
	            'is_manager' => 0,

	        ]);
        }
    }
}
