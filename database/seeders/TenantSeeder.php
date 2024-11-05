<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
