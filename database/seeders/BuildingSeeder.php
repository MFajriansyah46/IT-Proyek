<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
