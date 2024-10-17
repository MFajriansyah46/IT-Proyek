<?php

namespace Database\Seeders;

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

        Tenant::factory(60)->create();

        Owner::create([
            'name' => 'M. Fajriansyah',
            'rekening_number' => 893854483465346695,
            'phone_number' => 6282251964943,
            'username' => 'fazzarY',
            'password' => 'qwertyui',
            'remember_token' => Str::random(16),
        ]);

        Owner::create([
            'name' => 'Rusida',
            'rekening_number' => 4434758688968695,
            'phone_number' => 6287845964904,
            'username' => 'rusida443',
            'password' => 'rusida123',
            'remember_token' => Str::random(16),
        ]);
    } 
}
