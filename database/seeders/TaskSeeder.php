<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
        	DB::table('tasks')->insert([
	            'title' => Str::random(7),
	            'created_by' => rand(1,2),
	            'assigned_to' => rand(3,4),
	            'status_id' => rand(1,4),
	            'description' => Str::random(15)
	        ]);
	    }
    }
}
