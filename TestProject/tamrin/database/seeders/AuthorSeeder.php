<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Authors = [

            ['name' => 'James' , 'phone' => '0911'],
            ['name' => 'Arthur', 'phone' => '0912'],
            ['name' => 'John', 'phone' => '0913'],
            ['name' => 'BOB', 'phone' => '0914'],
        ];

        Author::insert($Authors);
    }
}
