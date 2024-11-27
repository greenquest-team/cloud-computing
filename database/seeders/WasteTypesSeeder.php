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
                ['type_name' => 'Plastic'],
                ['type_name' => 'Glass'],
                ['type_name' => 'Metal'],
                ['type_name' => 'Paper'],
                ['type_name' => 'Organic'],
            ];
    
            DB::table('waste_types')->insert($wasteTypes);
    }
}