<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Owner;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Owner::create([
            'name' => 'Rusida',
            'rekening_number' => 4434758688968695,
            'phone_number' => 6287845964904,
            'username' => 'rusida443',
            'password' => 'rusida123',
            'remember_token' => Str::random(16),
        ]);

        $this->call([
            BuildingSeeder::class,
            RoomSeeder::class,
            TenantSeeder::class,
            ConditionSeeder::class,
            CriteriaSeeder::class,
        ]);
    }
}
