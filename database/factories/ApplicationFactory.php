<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\PortalJob;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'portal_job_id' => PortalJob::factory(),
            'user_id' => User::factory(),
            'cover_letter' => $this->faker->paragraph,
            'resume' => $this->faker->url,
        ];
    }
}
