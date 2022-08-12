<?php

namespace Database\Seeders;

use App\Models\UserUsage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        $UserUsage = [
            [
                'user_id' => 1,
                'usage_id' => 1,
            ],

            [
                'user_id' => 1,
                'usage_id' => 2,
            ],

            [
                'user_id' => 1,
                'usage_id' => 3,
            ],

            [
                'user_id' => 1,
                'usage_id' => 4,
            ],

            [
                'user_id' => 1,
                'usage_id' => 5,
            ],

            [
                'user_id' => 1,
                'usage_id' => 6,
            ],

            [
                'user_id' => 1,
                'usage_id' => 7,
            ],

            [
                'user_id' => 1,
                'usage_id' => 8,
            ],

            [
                'user_id' => 1,
                'usage_id' => 9,
            ],

            [
                'user_id' => 2,
                'usage_id' => 1,
            ],

            [
                'user_id' => 2,
                'usage_id' => 2,
            ],

            [
                'user_id' => 2,
                'usage_id' => 3,
            ],

            [
                'user_id' => 2,
                'usage_id' => 4,
            ],

            [
                'user_id' => 2,
                'usage_id' => 5,
            ],

            [
                'user_id' => 2,
                'usage_id' => 6,
            ],

            [
                'user_id' => 2,
                'usage_id' => 7,
            ],

            [
                'user_id' => 2,
                'usage_id' => 8,
            ],

            [
                'user_id' => 2,
                'usage_id' => 9,
            ],

            [
                'user_id' => 3,
                'usage_id' => 2,
            ], 
            
            [
                'user_id' => 3,
                'usage_id' => 4,
            ],
        ];

        UserUsage::insert($UserUsage);
    }
}
