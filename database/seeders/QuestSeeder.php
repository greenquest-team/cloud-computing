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
            //scan
            ['waste_types_id' => 1, 'description_quest' => 'Ayo Scan Sampah Kertas', 'quest_type' => 'scan', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/kertas3.jpg'],
            ['waste_types_id' => 2, 'description_quest' => 'Ayo Scan Sampah Kardus', 'quest_type' => 'scan', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/cardboard.jpg'],
            ['waste_types_id' => 3, 'description_quest' => 'Ayo Scan Sampah Plastik', 'quest_type' => 'scan', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/botol2.jpg'],
            ['waste_types_id' => 4, 'description_quest' => 'Ayo Scan Sampah Baja/Metal', 'quest_type' => 'scan', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/metal.jpg'],
            ['waste_types_id' => 5, 'description_quest' => 'Ayo Scan Sampah Kaca', 'quest_type' => 'scan', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/glass.jpg'],

            // materi
            ['waste_types_id' => 1, 'description_quest' => 'Yuk belajar tentang sampah kertas!', 'quest_type' => 'material', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/kertas3.jpg'],
            ['waste_types_id' => 2, 'description_quest' => 'Yuk belajar tentang sampah kardus!', 'quest_type' => 'material', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/cardboard.jpg'],
            ['waste_types_id' => 3, 'description_quest' => 'Yuk belajar tentang sampah plastik!', 'quest_type' => 'material', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/botol2.jpg'],
            ['waste_types_id' => 4, 'description_quest' => 'Yuk belajar tentang sampah metal!', 'quest_type' => 'material', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/metal.jpg'],
            ['waste_types_id' => 5, 'description_quest' => 'Yuk belajar tentang sampah kaca!', 'quest_type' => 'material', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/glass.jpg'],

            // 
            ['waste_types_id' => 7, 'description_quest' => 'Sudahkan Anda membuang atau mendaur ulang sampah hari ini?', 'quest_type' => 'reminder', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/reminder.png'],
            ['waste_types_id' => 8, 'description_quest' => 'Mari Mengerjakan Kuis', 'quest_type' => 'quiz', 'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/quiz_1.png'],     
            
        ]);
    }
}
