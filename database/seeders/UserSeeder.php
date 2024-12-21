<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Seeder untuk Event Organizer
        User::create([
            'name' => 'Event Organizer User',
            'email' => 'eo@example.com',
            'password' => Hash::make('password123'),
            'role' => 'eventOrganizer',
        ]);

        // Seeder untuk Regular User
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}
