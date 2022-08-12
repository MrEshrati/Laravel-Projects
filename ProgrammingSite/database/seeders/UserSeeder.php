<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'CEO']);
        Role::create(['name' => 'User']);

        $owner = ['name' => 'Owner' , 
                    'email' => 'REDACTED' ,
                        'phone' => '00000000000',
                            'password' => Hash::make('REDACTED')];
        $ceo = ['name' => 'Arshia' , 
                    'email' => 'REDACTED' ,
                        'phone' => '00000000001',
                            'password' => Hash::make('REDACTED')];
        $user = ['name' => 'Paul' ,
                    'email' => 'REDACTED' ,
                        'phone' => '00000000002',
                            'password' => Hash::make('REDACTED')];
        
        $owner = User::create($owner);
        $ceo = User::create($ceo);
        $user = User::create($user);

        $owner -> assignRole(Role::findByName('Admin'));
        $ceo -> assignRole(Role::findByName('CEO'));
        $user -> assignRole(Role::findByName('User'));
    }
}
