<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            [
                'waste_types_id' => 1,
                'description_mat' => 'Plastic materials can be used to make eco-bricks.',
            ],
            [
                'waste_types_id' => 2,
                'description_mat' => 'Glass materials can be recycled into new bottles and jars.',
            ],
            [
                'waste_types_id' => 3,
                'description_mat' => 'Metal materials are often melted and reused in manufacturing[masuk akal].',
            ],
        ]);
    }
}
