<?php

namespace Database\Seeders;

use App\Models\DigitalContent;
use App\Models\DigitalContentType;
use Illuminate\Database\Seeder;

class DigitalContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        $types = [
            ['name' => 'Ebook'],
            ['name' => 'Podcast'],
        ];

        DigitalContentType::insert($types);
    }
}
