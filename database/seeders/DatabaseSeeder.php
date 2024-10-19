<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Owner;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tenant;
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
            'remember_token' => Str::random(16),
        ]);
        Building::create([
            'owner_id' => 1,
            'unit_bangunan' => 'B',
            'alamat_bangunan' => 'Jl. Pemuda no.8 Blok B KNPI',
            'remember_token' => Str::random(16),
        ]);
        Building::create([
            'owner_id' => 1,
            'unit_bangunan' => 'C',
            'alamat_bangunan' => 'Jl. A. Yani samping samsat',
            'remember_token' => Str::random(16),
        ]);
        Building::create([
            'owner_id' => 1,
            'unit_bangunan' => 'D',
            'alamat_bangunan' => 'Jl. Karamantih',
            'remember_token' => Str::random(16),
        ]);
        Building::create([
            'owner_id' => 2,
            'unit_bangunan' => 'A',
            'alamat_bangunan' => 'Jl. Swadaya no.100G RT.07 RW.03 desa Lorem',
            'remember_token' => Str::random(16),
        ]);
    } 
}
