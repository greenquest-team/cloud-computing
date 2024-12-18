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
                'waste_types_id' => 1, // Paper
                'description' => 'Limbah kertas yang didaur ulang dapat menghemat hingga 60% energi dibandingkan dengan membuat kertas baru dari bahan mentah.',
                'craft' => 'Kertas koran bekas yang biasanya hanya berakhir di tempat sampah dapat dilipat menjadi kotak penyimpanan kecil untuk barang-barang seperti perhiasan atau kunci.'
            ],
            [
                'waste_types_id' => 1, // Paper
                'description' => 'Tahukah kamu? Limbah kertas yang didaur ulang dapat menghemat hingga 60% energi dibandingkan dengan membuat kertas baru dari bahan mentah.',
                'craft' => 'Buku bekas yang sudah tidak terpakai bisa diubah menjadi karya seni pop-up atau diukir untuk membuat bentuk 3D seperti siluet hewan atau tanaman.'
            ],
            [
                'waste_types_id' => 2, // Cardboard
                'description' => 'Kardus merupakan salah satu jenis sampah yang paling banyak didaur ulang. Tingkat daur ulang globalnya mencapai 85% loh!',
                'craft' => 'Dengan sedikit imajinasi dan keterampilan, kardus bekas dapat dijadikan miniatur bangunan atau rumah mainan untuk anak-anak.'
            ],
            [
                'waste_types_id' => 2, // Cardboard
                'description' => 'Sudah tahukah kamu, sebuah kardus bekas dapat didaur ulang menjadi kardus yang baru hanya dalam waktu 14 hari setelah di daur ulang.',
                'craft' => 'Dengan sedikit imajinasi dan keterampilan, kardus bekas dapat dijadikan miniatur bangunan atau rumah mainan untuk anak-anak.'
            ],
            [
                'waste_types_id' => 3, // Plastic
                'description' => 'Plastik membutuhkan waktu hingga 1000 tahun untuk terurai sepenuhnya. Oleh karena itu, yuk kurangi penggunaan plastik sekali pakai!',
                'craft' => 'Botol plastik bekas yang tidak terpakai dapat dipotong dan dihias menjadi pot bunga gantung yang cantik untuk menghiasi halaman rumah atau balkon.'
            ],
            [
                'waste_types_id' => 3, // Plastic
                'description' => 'Hey Quessers! Sampah plastik yang dibuang ke lautan dapat membahayakan penyu karena ia akan mengira sampah itu adalah makanannya!',
                'craft' => 'Plastik kresek bekas yang biasanya hanya dibuang begitu saja bisa dianyam dengan teknik sederhana menjadi tas belanja ramah lingkungan yang tahan lama.'
            ],
            [
                'waste_types_id' => 4, // Metal
                'description' => 'Sebuah kaleng aluminium bekas dapat kembali ke rak toko dalam bentuk kaleng baru hanya dalam waktu 60 hari setelah didaur ulang.',
                'craft' => 'Kaleng minuman bekas dapat dicuci bersih dan dimodifikasi menjadi tempat pensil unik dengan tambahan cat atau stiker dekoratif.'
            ],
            [
                'waste_types_id' => 4, // Metal
                'description' => 'Tahukah kamu? besi yang berkarat dapat didaur ulang menjadi produk baru jika diproses dengan benar',
                'craft' => 'Tutup botol logam yang sering diabaikan bisa dirangkai menggunakan kawat menjadi hiasan dinding berbentuk bunga atau simbol tertentu yang artistik.'
            ],
            [
                'waste_types_id' => 5, // Glass
                'description' => 'Mendaur ulang satu ton kaca bisa menghemat lebih dari setengah ton pasir yang digunakan dalam pembuatan kaca baru',
                'craft' => 'Potongan botol kaca bekas yang dipotong dan dihaluskan bisa digunakan sebagai gelas minum unik atau tempat lilin artistik yang estetik.'
            ],
            [
                'waste_types_id' => 5, // Glass
                'description' => 'Satu botol kaca yang didaur ulang bisa menghemat energi untuk menyalakan lampu bohlam selama 4 jam',
                'craft' => 'Botol kaca bekas dapat dimanfaatkan sebagai vas bunga dengan menambahkan lukisan tangan atau pita hias di bagian luar untuk mempercantiknya.'
            ],
            [
                'waste_types_id' => 6, // trash
                'description' => 'Glass can be melted and reused in the manufacturing of new products.',
                'craft' => 'Glass jars and decorative items.'
            ],
            [
                'waste_types_id' => 7, // trash
                'description' => 'Glass can be melted and reused in the manufacturing of new products.',
                'craft' => 'Glass jars and decorative items.'
            ],
            [
                'waste_types_id' => 8, // trash
                'description' => 'Glass can be melted and reused in the manufacturing of new products.',
                'craft' => 'Glass jars and decorative items.'
            ],

        ];
        DB::table('waste_type_details')->insert($wasteTypeDetails);

    }
}
