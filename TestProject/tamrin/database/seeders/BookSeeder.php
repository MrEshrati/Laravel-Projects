<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $Books = [

            ['name' => 'FirstBook' , 'description' => 'FirstBookDes' , 'author_id' => 1],
            ['name' => 'SecondBook' , 'description' => 'SecondBookDes' , 'author_id' => 3],
            ['name' => 'ThirdBook', 'description' => 'ThirdBookDes' , 'author_id' => 2],
            ['name' => 'FourthBook', 'description' => 'FourthBookDes' , 'author_id' => 4],
        ];

        Book::insert($Books);
    }
}
