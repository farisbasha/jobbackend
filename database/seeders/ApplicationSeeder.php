<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    public function run()
    {
        Application::factory()->count(100)->create();
    }
}
