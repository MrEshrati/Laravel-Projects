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
    public function run()
    {
        $accounts = config('auth.seed_accounts');
        foreach ($accounts as $role => $credentials) {
            $password = $credentials['password'];
            if (!filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)
                || !is_string($password)
                || strlen($password) < 12
                || strlen($password) > 72) {
                throw new \RuntimeException(
                    'Set a valid email and a 12–72 byte password for the demo '.$role.' account.'
                );
            }
        }

        $emails = array_map('strtolower', array_column($accounts, 'email'));
        if (count(array_unique($emails)) !== count($accounts)) {
            throw new \RuntimeException('Use a different email for each demo account.');
        }

        $profiles = [
            'admin' => ['name' => 'Owner', 'role' => 'Admin', 'phone' => '00000000000'],
            'ceo' => ['name' => 'Demo CEO', 'role' => 'CEO', 'phone' => '00000000001'],
            'user' => ['name' => 'Demo User', 'role' => 'User', 'phone' => '00000000002'],
        ];

        \Illuminate\Support\Facades\DB::transaction(function () use ($accounts, $profiles) {
            foreach ($profiles as $account => $profile) {
                $role = Role::firstOrCreate(['name' => $profile['role']]);
                unset($profile['role']);
                $user = User::create(array_merge($profile, [
                    'email' => $accounts[$account]['email'],
                    'password' => Hash::make($accounts[$account]['password']),
                ]));
                $user->assignRole($role);
            }
        });
    }
}
