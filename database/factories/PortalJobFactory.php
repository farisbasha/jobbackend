<?php

namespace Database\Factories;

use App\Models\PortalJob;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortalJobFactory extends Factory
{
    protected $model = PortalJob::class;

    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'user_id' => User::factory(),
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->city,
            'salary' => $this->faker->numberBetween(50000, 200000),
        ];
    }
}
