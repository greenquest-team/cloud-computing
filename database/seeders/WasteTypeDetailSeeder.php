<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WasteTypeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wasteTypeDetails = [
            [
                'waste_types_id' => 1, // Plastic
                'description' => 'Plastic waste can be recycled into various products.',
                'craft' => 'Recycled plastic crafts like baskets and vases.'
            ],
            [
                'waste_types_id' => 1, // Plastic
                'description' => 'Plastic adalah plastik.',
                'craft' => 'Kapal Lawd.'
            ],
            [
                'waste_types_id' => 2, // Glass
                'description' => 'Glass can be melted and reused in the manufacturing of new products.',
                'craft' => 'Glass jars and decorative items.'
            ],
            [
                'waste_types_id' => 3, // Metal
                'description' => 'Metal waste is recyclable and used to make construction materials.',
                'craft' => 'Decorative metal crafts and sculptures.'
            ],
            [
                'waste_types_id' => 4, // Paper
                'description' => 'Paper waste can be recycled into new paper products.',
                'craft' => 'Handmade recycled paper and cards.'
            ],
            [
                'waste_types_id' => 5, // Organic
                'description' => 'Organic waste is biodegradable and can be composted.',
                'craft' => 'Organic fertilizers and gardening compost.'
            ],
        ];
        DB::table('waste_type_details')->insert($wasteTypeDetails);

    }
}
