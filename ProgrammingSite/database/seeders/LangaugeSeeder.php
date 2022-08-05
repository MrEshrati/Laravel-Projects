<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangaugeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        $languages = [

            [
                'name' => 'Python',
                'company_id' => 1, 
                'usage_id' => 1,
            ],

            [
                'name' => 'C#',
                'company_id' => 2,
                'usage_id' => 1,
            ],

            [
                'name' => 'JavaScript',
                'company_id' => 3,
                'usage_id' => 1,
            ],

            [
                'name' => 'CSS',
                'company_id' => 4,
                'usage_id' => 1,
            ],

            [
                'name' => 'PHP',
                'company_id' => 5,
                'usage_id' => 1,
            ],

            [
                'name' => 'JAVA',
                'company_id' => 6,
                'usage_id' => 1,
            ],
        ];

        Language::insert($languages);
    }
}
