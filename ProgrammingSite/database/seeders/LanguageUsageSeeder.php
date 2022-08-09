<?php

namespace Database\Seeders;

use App\Models\LanguageUsage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        $LanguageUsage = [

            [
                'language_id' => 1,
                'usage_id' => 1, 
            ],
            
            [
                'language_id' => 1,
                'usage_id' => 3, 
            ],
            
            [
                'language_id' => 1,
                'usage_id' => 4, 
            ],
            
            [
                'language_id' => 1,
                'usage_id' => 5, 
            ],
            
            [
                'language_id' => 1,
                'usage_id' => 6, 
            ],
            
            [
                'language_id' => 1,
                'usage_id' => 7, 
            ],
            
            [
                'language_id' => 1,
                'usage_id' => 9, 
            ],
            
            [
                'language_id' => 2,
                'usage_id' => 8, 
            ],
            
            [
                'language_id' => 3,
                'usage_id' => 1, 
            ],
            
            [
                'language_id' => 3,
                'usage_id' => 2, 
            ],

            [
                'language_id' => 3,
                'usage_id' => 5, 
            ],

            [
                'language_id' => 3,
                'usage_id' => 6, 
            ],

            [
                'language_id' => 3,
                'usage_id' => 8, 
            ],

            [
                'language_id' => 4,
                'usage_id' => 2, 
            ],

            [
                'language_id' => 5,
                'usage_id' => 2, 
            ],

            [
                'language_id' => 6,
                'usage_id' => 1, 
            ],
            
            [
                'language_id' => 6,
                'usage_id' => 2, 
            ],

            [
                'language_id' => 6,
                'usage_id' => 3, 
            ],

            [
                'language_id' => 6,
                'usage_id' => 4, 
            ],

            [
                'language_id' => 6,
                'usage_id' => 5, 
            ],

            [
                'language_id' => 6,
                'usage_id' => 6, 
            ],

            [
                'language_id' => 6,
                'usage_id' => 7, 
            ],

            [
                'language_id' => 6,
                'usage_id' => 8, 
            ],

            [
                'language_id' => 6,
                'usage_id' => 9, 
            ],
        ];

        LanguageUsage::insert($LanguageUsage);
    }
}
