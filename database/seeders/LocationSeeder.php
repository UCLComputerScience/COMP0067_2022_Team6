<?php

namespace Database\Seeders;

//use Illuminate\Database\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a seed locations
       \DB ::table( table: 'location')->insert([
            'id' => 15,
            'member_name' => 'OxfamTEST',
            'address' => '50 Jones Street',
            'sdg' => 51.510525,
            'lon' => -0.146446,
            'description' => 'I am Oxfam!' 
        //'created_at' => date( format: 'Y-m-d H:i:s')  
        //'created_at' => date( format: 'Y-m-d H:i:s') 
    ]);
    }
}


