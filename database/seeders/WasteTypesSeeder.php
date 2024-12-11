<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WasteTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $wasteTypes = [
                ['type_name' => 'paper'],
                ['type_name' => 'cardboard'],
                ['type_name' => 'plastic'],
                ['type_name' => 'metal'],
                ['type_name' => 'glass'],
                ['type_name' => 'trash'],
                ['type_name' => 'reminder'],
                ['type_name' => 'quiz'],
            ];
    
            DB::table('waste_types')->insert($wasteTypes);
    }
}