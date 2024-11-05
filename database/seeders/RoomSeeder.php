<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'no_kamar' => '1',
            'id_bangunan' => '1',
            'harga_kamar' => '425000',
            'kecepatan_internet' => '100',
            'gambar_kamar' => 'room-images/k1.jpg',
            'token' => Str::random(16),
        ]);

        Room::create([
            'no_kamar' => '2',
            'id_bangunan' => '1',
            'harga_kamar' => '450000',
            'kecepatan_internet' => '78',
            'gambar_kamar' => 'room-images/k2.jpg',
            'token' => Str::random(16),
        ]);

        Room::create([
            'no_kamar' => '1',
            'id_bangunan' => '2',
            'harga_kamar' => '400000',
            'kecepatan_internet' => '12',
            'gambar_kamar' => 'room-images/k3.jpg',
            'token' => Str::random(16),
        ]);

        Room::create([
            'no_kamar' => '1',
            'id_bangunan' => '3',
            'harga_kamar' => '425000',
            'kecepatan_internet' => '81',
            'gambar_kamar' => 'room-images/k4.jpg',
            'token' => Str::random(16),
        ]);

        Room::create([
            'no_kamar' => '2',
            'id_bangunan' => '2',
            'harga_kamar' => '400000',
            'kecepatan_internet' => '8',
            'gambar_kamar' => 'room-images/k5.jpeg',
            'token' => Str::random(16),
        ]);
    }
}
