<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quests')->insert([
            ['waste_types_id' => 1, 'description_quest' => 'Scan plastic waste', 'quest_type' => 'scan'],
            ['waste_types_id' => 2, 'description_quest' => 'Scan glass waste', 'quest_type' => 'scan'],
            ['waste_types_id' => 3, 'description_quest' => 'Scan metal waste', 'quest_type' => 'scan'],
            ['waste_types_id' => 2, 'description_quest' => 'Learn about glass waste', 'quest_type' => 'material'],
            ['waste_types_id' => 1, 'description_quest' => 'Learn about plastic waste', 'quest_type' => 'material'],
            ['waste_types_id' => 1, 'description_quest' => 'belajar plastik', 'quest_type' => 'material'],
            ['waste_types_id' => 3, 'description_quest' => 'belajar metal', 'quest_type' => 'material'],
            ['waste_types_id' => 1, 'description_quest' => 'Quiz on plastic waste', 'quest_type' => 'quiz'],
            ['waste_types_id' => 2, 'description_quest' => 'Quiz on glass waste', 'quest_type' => 'quiz'],
            ['waste_types_id' => 3, 'description_quest' => 'Quiz on metal waste', 'quest_type' => 'quiz'],
            ['waste_types_id' => 4, 'description_quest' => 'Sudahkan Anda membuang atau mendaur ulang sampah hari ini?', 'quest_type' => 'reminder'],
        ]);
    }
}
