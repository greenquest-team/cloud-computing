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
            [
                'waste_types_id' => 1, 
                'question' => 'Apa yang sebaiknya dilakukan dengan botol plastik bekas?', 
                'option_a' => 'Dimakan',
                'option_b' => 'Didaur ulang', 
                'option_c' => 'Dibakar', 
                'option_d' => 'Dibuang di jalan', 
                'correct_answer' => 'Didaur ulang',
            ],
            [
                'waste_types_id' => 1, 
                'question' => 'Apa yang sebaiknya dilakukan dengan botol plastik bekas?', 
                'option_a' => 'Dimakan',
                'option_b' => 'Didaur ulang', 
                'option_c' => 'Dibakar', 
                'option_d' => 'Dibuang di jalan', 
                'correct_answer' => 'Didaur ulang',
            ],
            [
                'waste_types_id' => 2, 
                'question' => 'Apa yang sebaiknya dilakukan dengan botol plastik bekas?', 
                'option_a' => 'Dimakan',
                'option_b' => 'Didaur ulang', 
                'option_c' => 'Dibakar', 
                'option_d' => 'Dibuang di jalan', 
                'correct_answer' => 'Didaur ulang',
            ],
            [
                'waste_types_id' => 2, 
                'question' => 'Apa yang sebaiknya dilakukan dengan botol plastik bekas?', 
                'option_a' => 'Dimakan',
                'option_b' => 'Didaur ulang', 
                'option_c' => 'Dibakar', 
                'option_d' => 'Dibuang di jalan', 
                'correct_answer' => 'Didaur ulang',
            ],
            [
                'waste_types_id' => 3, 
                'question' => 'Apa yang sebaiknya dilakukan dengan botol plastik bekas?', 
                'option_a' => 'Dimakan',
                'option_b' => 'Didaur ulang', 
                'option_c' => 'Dibakar', 
                'option_d' => 'Dibuang di jalan', 
                'correct_answer' => 'Didaur ulang',
            ],
            [
                'waste_types_id' => 3, 
                'question' => 'Apa yang sebaiknya dilakukan dengan botol plastik bekas?', 
                'option_a' => 'Dimakan',
                'option_b' => 'Didaur ulang', 
                'option_c' => 'Dibakar', 
                'option_d' => 'Dibuang di jalan', 
                'correct_answer' => 'Didaur ulang',
            ],
            [
                'waste_types_id' => 3, 
                'question' => 'Apa yang sebaiknya dilakukan dengan botol plastik bekas?', 
                'option_a' => 'Dimakan',
                'option_b' => 'Didaur ulang', 
                'option_c' => 'Dibakar', 
                'option_d' => 'Dibuang di jalan', 
                'correct_answer' => 'Didaur ulang',
            ],
            [
                'waste_types_id' => 3, 
                'question' => 'Apa yang sebaiknya dilakukan dengan botol plastik bekas?', 
                'option_a' => 'Dimakan',
                'option_b' => 'Didaur ulang', 
                'option_c' => 'Dibakar', 
                'option_d' => 'Dibuang di jalan', 
                'correct_answer' => 'Didaur ulang',
            ],
            [
                'waste_types_id' => 3, 
                'question' => 'Apakah plastik bisa didaur ulang?',
                'option_a' => 'Ya',
                'option_b' => 'Tidak',
                'option_c' => 'Hanya beberapa jenis plastik',
                'option_d' => 'Tidak tahu',
                'correct_answer' => 'Ya'              
            ],

            [
                'waste_types_id' => 3, 
                'question' => 'Apa yang terjadi jika plastik tidak didaur ulang?',
                'option_a' => 'Menghasilkan limbah yang menumpuk',
                'option_b' => 'Mengurangi polusi',
                'option_c' => 'Menjadi makanan Ricko',
                'option_d' => 'Menghilang dengan sendirinya',
                'correct_answer' => 'Menghasilkan limbah yang menumpuk'
            ],
            
            [
                'waste_types_id' => 4, 
                'question' => 'Apa yang terjadi jika kita tidak mendaur ulang kaca?',
                'option_a' => 'Kaca akan menumpuk menjadi sampah',
                'option_b' => 'Kaca akan hilang dengan sendirinya',
                'option_c' => 'Kaca akan menjadi makanan hewan',
                'option_d' => 'Kaca akan berubah menjadi logam',
                'correct_answer' => 'Kaca akan menumpuk menjadi sampah'
            ]
            
        ]);
    }
}
