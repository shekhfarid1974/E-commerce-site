<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Category::create([
             'title'=>'MEN',
             'description' => 'MEN DESC'
         ]);

         \App\Models\Category::create([
            'title'=>'WOMEN',
            'description' => 'WOMEN DESC'
        ]);

        \App\Models\Category::create([
            'title'=>'WOMEN',
            'description' => 'MEN DESC'
        ]);
    }
}
