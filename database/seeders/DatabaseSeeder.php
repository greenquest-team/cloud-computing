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
        User::factory()->create([
            'name' => 'Agus Scavenger',
            'username' => 'agus',
            'email' => 'test@example.com',
            'tgl_lahir' => '10/10/2004',
            'points' => '60',
            'avatar' => 'https://storage.googleapis.com/greenquest-bucket/avatars/plants.png'
        ]);

        User::factory()->create([

            'name' => 'zoya nujula',
            'username' => 'zoya',
            'email' => 'bebek1@example.com',
            'tgl_lahir' => '10/10/2004',
            'points' => '50',
            'avatar' => 'https://storage.googleapis.com/greenquest-bucket/avatars/smile-earth.png',
        ]);

        $this->call([
            UserSeeder::class,
            WasteTypesSeeder::class,
            WasteTypeDetailSeeder::class,
            MaterialSeeder::class,
            QuizSeeder::class,
            QuestSeeder::class,
        ]);
        
    }
}
