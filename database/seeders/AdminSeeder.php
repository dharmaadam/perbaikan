<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@careit.com'],
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@careit.com',
                'role' => 'admin',
                'password' => Hash::make('password123'), // password = password123
            ]
        );
    }
}
