<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'points' => rand(0, 100),
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'ayam@example.com',
            'points' => rand(0, 100),
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'bebek@example.com',
            'points' => rand(0, 100),
        ]);

        $this->call([
            WasteTypesSeeder::class,
            WasteTypeDetailSeeder::class,
            MaterialSeeder::class,
            QuizSeeder::class,
            QuestSeeder::class,
            UserQuestSeeder::class,
        ]);
        
    }
}
