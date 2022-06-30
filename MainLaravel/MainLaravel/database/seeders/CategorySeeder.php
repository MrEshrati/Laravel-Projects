<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        $categories = [

            ['name' => 'History' , 'parent_id' => null],
            ['name' => 'Fantasy' , 'parent_id' => null],
            ['name' => 'Education' , 'parent_id' => null],
            ['name' => 'computer' , 'parent_id' => 2],

        ];

        Category::insert($categories);
    }
}
