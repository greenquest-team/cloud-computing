<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserQuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_quests')->insert([
            [
                'user_id' => 1,
                'quest_id' => 1,
                'progress_status' => 'not_started',
                'points_awarded' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'quest_id' => 2,
                'progress_status' => 'in_progress',
                'points_awarded' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'quest_id' => 1,
                'progress_status' => 'completed',
                'points_awarded' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'quest_id' => 3,
                'progress_status' => 'in_progress',
                'points_awarded' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
