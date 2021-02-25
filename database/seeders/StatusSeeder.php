<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $array =[
            ["name" =>"created"],
            ["name" =>"assigned"],
            ["name" =>"in-progress"],
            ["name" =>"done"]
           
        ] ;

        for ($i=0; $i < count($array); $i++) { 
        	DB::table('statuses')->insert([
	            'name' => $array[$i]["name"]
                
	        ]);
        }
    }
}
