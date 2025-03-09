<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->hasTasks(5)->create();

        User::factory()->hasTasks(100)->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
        ]);
    }
}
