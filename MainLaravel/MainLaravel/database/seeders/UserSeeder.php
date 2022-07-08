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
        Role::create(['name' => 'User']);

        $admin = ['name' => 'admin' , 'email' => 'REDACTED' , 
        'password' => Hash::make('REDACTED')];

        $user = ['name' => 'arshia' , 'email' => 'REDACTED' , 
        'password' => Hash::make('REDACTED')];

        $admin = User::create($admin);
        $user = User::create($user);

        $admin -> assignRole(Role::findByName('Admin'));
        $user -> assignRole(Role::findByName('User'));
    }
}
