<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'testuser', // Known username
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Explicit password
            'is_active' => true,
        ]);
    }
}
