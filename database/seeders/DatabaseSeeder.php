<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default test user
      /*  User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        // Admin user seeder
        User::create([
            'name' => 'Admin',
            'email' => 'arafat@gmail.com',
            'password' => Hash::make('qwerty12'), // or bcrypt('password')
            'role' => 'admin',
        ]);
    }
}
