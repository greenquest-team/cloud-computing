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
            // paper
            [
                'waste_types_id' => 1,
                'description_mat' => 'Tahukah kamu? Satu pohon dapat menghasilkan kertas sebanyak 8.000 lembar, tetapi perlu waktu puluhan tahun untuk tumbuh kembali.',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/kertas3.jpg',
            ],
            [
                'waste_types_id' => 1,
                'description_mat' => 'Tahukah kamu? Dengan mendaur ulang 1 ton kertas, kita bisa menghemat hingga 17 pohon dewasa dari penebangan.',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/kertas3.jpg',
            ],
            // cardboard
            [
                'waste_types_id' => 2,
                'description_mat' => 'Tahukah kamu? Jika dibuang sembarangan, cardboard membutuhkan waktu sekitar 2 bulan hingga 5 tahun untuk terurai di alam.',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/cardboard.jpg',
            ],
            [
                'waste_types_id' => 2,
                'description_mat' => 'Tahukah kamu? Jika dibuang sembarangan, cardboard membutuhkan waktu sekitar 2 bulan hingga 5 tahun untuk terurai di alam.',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/cardboard.jpg',
            ],
            // plastic
            [
                'waste_types_id' => 3,
                'description_mat' => 'Tahukah kamu? Plastik membutuhkan waktu hingga 1000 tahun untuk terurai sepenuhnya. Oleh karena itu, yuk kurangi penggunaan plastik sekali pakai!',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/botol2.jpg',
            ],
            [
                'waste_types_id' => 3,
                'description_mat' => 'Tahukah kamu? Kantong plastik ditemukan pada tahun 1965, tetapi dampaknya terhadap lingkungan mulai terasa baru beberapa dekade kemudian.',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/botol2.jpg',
            ],
            // metal
            [
                'waste_types_id' => 4,
                'description_mat' => 'Tahukah kamu? Sebuah kaleng aluminium yang didaur ulang dapat kembali menjadi kaleng baru hanya dalam waktu 60 hari!',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/metal.jpg',
            ],
            [
                'waste_types_id' => 4,
                'description_mat' => 'Tahukah kamu? Kaleng baja dan aluminium yang tidak didaur ulang membutuhkan waktu hingga 50 hingga 200 tahun untuk terurai di alam.',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/metal.jpg',
            ],
            // glass
            [
                'waste_types_id' => 5,
                'description_mat' => 'Tahukah kamu? Botol kaca membutuhkan waktu hingga 4000 tahun untuk terurai di alam.',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/glass.jpg',
            ],
            [
                'waste_types_id' => 5,
                'description_mat' => 'Tahukah kamu? Kaca yang tidak didaur ulang sering berakhir di lautan,dan dapat membahayakan makhluk laut karena serpihannya tajam.',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/glass.jpg',
            ],
            // trash
            [
                'waste_types_id' => 6,
                'description_mat' => 'Metal materials are often melted and reused in manufacturing[masuk akal].',
                'image' => '',
            ],
            // [
            //     'waste_types_id' => 7,
            //     'description_mat' => 'Plastic materials can be used to make eco-bricks.',
            // ],
            // [
            //     'waste_types_id' => 8,
            //     'description_mat' => 'Glass materials can be recycled into new bottles and jars.',
            // ],

        ]);
    }
}
