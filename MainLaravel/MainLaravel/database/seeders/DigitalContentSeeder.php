<?php

namespace Database\Seeders;

use App\Models\DigitalContent;
use Illuminate\Database\Seeder;

class DigitalContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $faker = \Faker\Factory::create();
        
        $products = [

            [
                'name' => 'First Product',
                'digital_content_type_id' => 1,
                'description' => $faker -> sentence(5 , true),
                'price' => 80000,
                'discount' => 50000,
            ],

            [
                'name' => 'Second Product',
                'digital_content_type_id' => 1,
                'description' => $faker -> sentence(5 , true),
                'price' => 60000,
                'discount' => 20000,
            ],

            [
                'name' => 'Third Product',
                'digital_content_type_id' => 2,
                'description' => $faker -> sentence(5 , true),
                'price' => 100000,
                'discount' => 40000,
            ],

            [
                'name' => 'Fourth Product',
                'digital_content_type_id' => 2,
                'description' => $faker -> sentence(5 , true),
                'price' => 55000,
                'discount' => 15000,
            ],
        
        ];

        DigitalContent::insert($products);
    }
}
