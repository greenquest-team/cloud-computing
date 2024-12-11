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
        $avatar = 'https://storage.googleapis.com/greenquest-bucket/avatars/plants.png';

        User::factory()->create([
            'name' => 'Agus Scavenger',
            'username' => 'agus',
            'email' => 'agus@example.com',
            'tgl_lahir' => '10/10/2004',
            'points' => rand(0, 100),
            'password' => 'ayampos',
            'avatar' => $avatar,
        ]);

        User::factory()->create([
            'name' => 'ricko',
            'username' => 'ricko',
            'email' => 'ayam@example.com',
            'tgl_lahir' => '10/10/2004',
            'points' => rand(0, 100),
            'avatar' => $avatar

        ]);
        User::factory()->create([
            'name' => 'Junai',
            'username' => 'Junai',
            'email' => 'bebek12@example.com',
            'tgl_lahir' => '10/10/2004',
            'points' => rand(0, 100),
            'avatar' => $avatar

            
        ]);
        User::factory()->create([
            'name' => 'Junaihaha',
            'username' => 'Junia',
            'email' => 'bebek1@example.com',
            'tgl_lahir' => '10/10/2004',
            'points' => rand(0, 100),
            'avatar' => $avatar

        ]);

        $this->call([
            WasteTypesSeeder::class,
            WasteTypeDetailSeeder::class,
            MaterialSeeder::class,
            QuizSeeder::class,
            QuestSeeder::class,
            // UserQuestSeeder::class,
        ]);
        
    }
}
