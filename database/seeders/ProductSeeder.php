<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {
         \App\Models\Product::create([
             'name'=>'laptop',
             'image' => 'img',
             'price' =>'8344',
             'unit' =>'er888',

         ]);


    }
}
