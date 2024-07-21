<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Basha',
            'email' => 'basha@test.com',
            'password' => Hash::make('password'),
        ]);
        $this->call([
            CompanySeeder::class,
            PortalJobSeeder::class,
            ApplicationSeeder::class,
        ]);
    }
}
