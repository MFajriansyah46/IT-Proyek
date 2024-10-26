<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Owner;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tenant;
use App\Models\Building;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Tenant::create([
            'name' => 'M. Fajriansyah',
            'phone_number' => 6282251964943,
            'image' => 'profile-images/pi1.jpg',
            'username' => 'fazzar.yusuf',
            'password' => 'barabaidangers',
            'remember_token' => Str::random(16),
        ]);

        Tenant::factory(24)->create();

        Owner::create([
            'name' => 'Rusida',
            'rekening_number' => 4434758688968695,
            'phone_number' => 6287845964904,
            'username' => 'rusida443',
            'password' => 'rusida123',
            'remember_token' => Str::random(16),
        ]);

        Owner::create([
            'name' => 'M. Fajriansyah',
            'rekening_number' => 893854483465346695,
            'phone_number' => 6282251964943,
            'username' => 'fazzarY',
            'password' => 'qwertyui',
            'remember_token' => Str::random(16),
        ]);

        Building::create([
            'owner_id' => 1,
            'unit_bangunan' => 'A',
            'alamat_bangunan' => 'Jl. Pemuda no.2 Blok f KNPI',
            'token' => Str::random(16),
        ]);
        Building::create([
            'owner_id' => 1,
            'unit_bangunan' => 'B',
            'alamat_bangunan' => 'Jl. Pemuda no.8 Blok B KNPI',
            'token' => Str::random(16),
        ]);
        Building::create([
            'owner_id' => 1,
            'unit_bangunan' => 'C',
            'alamat_bangunan' => 'Jl. A. Yani samping samsat',
            'token' => Str::random(16),
        ]);
        Building::create([
            'owner_id' => 1,
            'unit_bangunan' => 'D',
            'alamat_bangunan' => 'Jl. Karamantih',
            'token' => Str::random(16),
        ]);
        Building::create([
            'owner_id' => 2,
            'unit_bangunan' => 'A',
            'alamat_bangunan' => 'Jl. Swadaya no.100G RT.07 RW.03 desa Lorem',
            'token' => Str::random(16),
        ]);

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
