<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Condition::create([
            'name' => 'Very Good',
            'index' => '5',
            'color' => 'gradient-blue',
        ]);

        Condition::create([
            'name' => 'Good',
            'index' => '4',
            'color' => 'gradient-light-blue',
        ]);

        Condition::create([
            'name' => 'Sufficient',
            'index' => '3',
            'color' => 'gradient-green',
        ]);

        Condition::create([
            'name' => 'Poor',
            'index' => '2',
            'color' => 'gradient-yellow',
        ]);

        Condition::create([
            'name' => 'Very Poor',
            'index' => '1',
            'color' => 'gradient-orange',
        ]);

        Condition::create([
            'name' => 'Unacceptable/None',
            'index' => '0',
            'color' => 'gradient-red',
        ]);
    }
}
