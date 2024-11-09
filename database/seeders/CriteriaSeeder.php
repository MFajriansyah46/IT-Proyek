<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criteria::create([
            'owner_id' => 1,
            'criteria_name' => 'harga_kamar',
            'weight' => 0.4,
        ]);
        Criteria::create([
            'owner_id' => 1,
            'criteria_name' => 'kecepatan_internet',
            'weight' => 0.2
        ]);
        Criteria::create([
            'owner_id' => 1,
            'criteria_name' => 'rates_avg_rate',
            'weight' => 0.15
        ]);
        Criteria::create([
            'owner_id' => 1,
            'criteria_name' => 'average_condition_index',
            'weight' => 0.25
        ]);
    }
}
