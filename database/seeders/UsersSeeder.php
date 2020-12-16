<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@recap.com',
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@recap.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
