<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {



        DB::table('roles')->insert([

            'name' => 'Admin'
            
        ]);

        DB::table('roles')->insert([

            'name' => 'Editor'
            
        ]);

        DB::table('roles')->insert([

            'name' => 'User'
            
        ]);


        // $this->call([
        //     CategorySeeder::class,
        //     ProductSeeder::class,
        // ]);

    }
}
