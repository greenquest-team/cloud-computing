<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Tambahkan ini untuk mengimpor model User

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // factory(User::class, 50)->create(); // Membuat 50 pengguna
        User::factory()->count(3)->create();

        $defaultAvatars = [
            'https://storage.googleapis.com/greenquest-bucket/avatars/plants.png',
            'https://storage.googleapis.com/greenquest-bucket/avatars/meme-bumi.jpg',
            'https://storage.googleapis.com/greenquest-bucket/avatars/smile-earth.png',
            'https://storage.googleapis.com/greenquest-bucket/avatars/trash-can.png',
            'https://storage.googleapis.com/greenquest-bucket/avatars/duckiey.png',
            'https://storage.googleapis.com/greenquest-bucket/avatars/bunny.png',
            'https://storage.googleapis.com/greenquest-bucket/avatars/garbage-bin.png',
        ];

        $avatar = $defaultAvatars[array_rand($defaultAvatars)]; // Pilih avatar default secara acak


        // $avatar = 'https://storage.googleapis.com/greenquest-bucket/avatars/plants.png';

        // DB::table('users')->insert([
            
        //     [
        //         'name' => 'Agus Scavenger',
        //         'username' => 'agus',
        //         'email' => 'agus@example.com',
        //         'tgl_lahir' => '10/10/2004',
        //         'password' => 'ayampos12',
        //         'points' => '70',
        //         'avatar' => $avatar,
        //     ],
        //     [
        //         'name' => 'aizen sungai andai satir',
        //         'username' => 'aizen',
        //         'email' => 'bebek1@example.com',
        //         'tgl_lahir' => '10/10/2004',
        //         'password' => 'satirbeliau',
        //         'points' => '85',
        //         'avatar' => 'https://assets.ggwp.id/2022/07/fakta-sosuke-aizen-featured-640x360.jpg',
        //    ],
        // ]);      
    }
}
