<?php

namespace Database\Seeders;

use App\Models\PortalJob;
use Illuminate\Database\Seeder;

class PortalJobSeeder extends Seeder
{
    public function run()
    {
        PortalJob::factory()->count(50)->create();
    }
}
