<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        $usages = [ 

            [ 'name' => 'Software application development' ], 
            [ 'name' => 'Web development' ], 
            [ 'name' => 'Computer systems engineering' ],
            [ 'name' => 'Database administration' ],
            [ 'name' => 'Computer systems analysis' ],
            [ 'name' => 'Software quality assurance engineering' ],
            [ 'name' => 'Business intelligence analysis' ],
            [ 'name' => 'Computer programming' ],
            [ 'name' => 'Network system administration' ],    

        ];
    }
}
