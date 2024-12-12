<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quizzes')->insert([
            // paper
            [
                'waste_types_id' => 1, 
                
                'question' => 'Kertas bekas yang didaur ulang dapat digunakan untuk membuat...', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/paper2.jpg',
                'option_a' => 'Vas bunga',
                'option_b' => 'Besi tua', 
                'option_c' => 'Bahan bakar kendaraan', 
                'option_d' => 'Bingkai foto', 
                'correct_answer' => 'Bingkai foto',
            ],
            [
                'waste_types_id' => 1, 
                'question' => 'Apa yang sebaiknya dilakukan dengan kertas koran bekas?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/kertas3.jpg',
                'option_a' => 'Dibakar di rumah',
                'option_b' => 'Dibuang ke jalan', 
                'option_c' => 'Dibuang ke saluran air', 
                'option_d' => 'Dibuat menjadi kotak penyimpanan kecil', 
                'correct_answer' => 'Dibuat menjadi kotak penyimpanan kecil',
            ],
            [
                'waste_types_id' => 1, 
                'question' => 'Apa keuntungan mendaur ulang kertas?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/paper1.jpg',
                'option_a' => 'Membutuhkan lebih banyak energi',
                'option_b' => 'Mengurangi penggunaan pohon baru', 
                'option_c' => 'Membuat kertas lebih mahal', 
                'option_d' => 'Menghasilkan polusi lebih banyak', 
                'correct_answer' => 'Mengurangi penggunaan pohon baru',
            ],
            // cardboard
            [
                'waste_types_id' => 2, 
                'question' => 'Apa yang bisa dilakukan dengan kardus bekas?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/cardboard.jpg',
                'option_a' => 'Dijadikan tempat alat tulis',
                'option_b' => 'Dibuang ke laut', 
                'option_c' => 'Dibakar tanpa filter', 
                'option_d' => 'Ditinggalkan begitu saja', 
                'correct_answer' => 'Dijadikan tempat alat tulis',
            ],
            [
                'waste_types_id' => 2, 
                'question' => 'Mengapa kardus lebih mudah didaur ulang dibandingkan plastik?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/kardus2.jpeg',
                'option_a' => 'Karena lebih ringan',
                'option_b' => 'Karena bisa dimakan oleh hewan', 
                'option_c' => 'Karena warnanya menarik', 
                'option_d' => 'Karena terbuat dari bahan alami', 
                'correct_answer' => 'Karena terbuat dari bahan alami',
            ],
            [
                'waste_types_id' => 2, 
                'question' => 'Berapa kali kardus bisa didaur ulang?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/kardus3.jpg',
                'option_a' => 'Tidak bisa didaur ulang',
                'option_b' => 'Hanya sekali', 
                'option_c' => 'Beberapa kali hingga seratnya rusak', 
                'option_d' => 'Tanpa batas waktu', 
                'correct_answer' => 'Beberapa kali hingga seratnya rusak',
            ],

            // plastic
            [
                'waste_types_id' => 3, 
                'question' => 'Apa yang sebaiknya dilakukan dengan botol plastik bekas?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/botol2.jpg',
                'option_a' => 'Dikubur',
                'option_b' => 'Didaur ulang', 
                'option_c' => 'Dibakar', 
                'option_d' => 'dibuang kejalan', 
                'correct_answer' => 'Didaur ulang',
            ],
            [
                'waste_types_id' => 3, 
                'question' => 'Mengapa penting untuk mengurangi penggunaan plastik sekali pakai?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/plastic3.jpeg',
                'option_a' => 'Karena plastik terlalu mahal',
                'option_b' => 'Karena plastik tidak dapat diwarnai', 
                'option_c' => 'Karena plastik membutuhkan ratusan tahun untuk terurai', 
                'option_d' => 'Karena plastik mudah rusak', 
                'correct_answer' => 'Karena plastik membutuhkan ratusan tahun untuk terurai',
            ],
            [
                'waste_types_id' => 3, 
                'question' => 'Apa yang bisa dibuat dari tutup botol plastik bekas?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/botol1.jpg',
                'option_a' => 'Perhiasan emas',
                'option_b' => 'Bahan pembuat kaca', 
                'option_c' => 'Mozaik hiasan dinding', 
                'option_d' => 'Baterai isi ulang', 
                'correct_answer' => 'Mozaik hiasan dinding',
            ],

            // metal
            [
                'waste_types_id' => 4, 
                'question' => 'Apa manfaat utama dari mendaur ulang logam?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/metal.jpg',
                'option_a' => 'Menghemat energi',
                'option_b' => 'Menghasilkan polusi lebih banyak', 
                'option_c' => 'Membuat logam lebih berat', 
                'option_d' => 'Membuat logam lebih mahal', 
                'correct_answer' => 'Menghemat energi',
            ],
            [
                'waste_types_id' => 4, 
                'question' => 'Apa yang bisa dibuat dari kaleng aluminium bekas?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/metal3.jpeg',
                'option_a' => 'Lampu hias',
                'option_b' => 'Gelas minum', 
                'option_c' => 'Perhiasan sederhana', 
                'option_d' => 'Semua jawaban benar', 
                'correct_answer' => 'Semua jawaban benar',
            ],
            [
                'waste_types_id' => 4, 
                'question' => 'Apa yang bisa kita lakukan dengan kaleng aluminium bekas?', 
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/metal4.jpg',
                'option_a' => 'Tidak ada',
                'option_b' => 'Buang begitu saja', 
                'option_c' => 'Daur ulang menjadi kaleng baru', 
                'option_d' => 'Hias rumah', 
                'correct_answer' => 'Daur ulang menjadi kaleng baru',
            ],

            // glass
            [
                'waste_types_id' => 5, 
                'question' => 'Mengapa kaca membahayakan makhluk hidup di lautan? ',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/glass.jpg',
                'option_a' => 'Karena berat',
                'option_b' => 'Karena serpihan nya tajam',
                'option_c' => 'Karena tampilannya tidak menarik',
                'option_d' => 'Rasanya tidak enak',
                'correct_answer' => 'Karena serpihan nya tajam'              
            ],
            [
                'waste_types_id' => 5, 
                'question' => 'Apa saja kerajinan daur ulang yang bisa dibuat dari botol kaca? ',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/kaca3.jpg    ',
                'option_a' => 'Sepatu',
                'option_b' => 'Alat tulis',
                'option_c' => 'Vas bunga',
                'option_d' => 'Tas belanja',
                'correct_answer' => 'Vas bunga'
            ],
            [
                'waste_types_id' => 5, 
                'question' => 'Apa yang terjadi dengan kualitas botol kaca yang didaur ulang berkali-kali?',
                'image' => 'https://storage.googleapis.com/greenquest-bucket/image-waste-types/kaca2.jpeg',
                'option_a' => 'Kualitasnya menurun',
                'option_b' => 'Kualitasnya tetap sama',
                'option_c' => 'Tidak bisa didaur ulang',
                'option_d' => 'Hanya bisa didaur ulang sekali',
                'correct_answer' => 'Kualitasnya tetap sama'
            ],
            
        ]);
    }
}
