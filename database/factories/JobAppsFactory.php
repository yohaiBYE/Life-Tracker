<?php

namespace Database\Factories;

use App\Models\JobApps;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobApps>
 */
class JobAppsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'company_name' => fake()->company(),
            'role' => fake()->jobTitle(),
            'status' => fake()->randomElement(['applied', 'interviewing', 'offered', 'rejected', 'accepted']),
            'applied_at' => fake()->date(),
            'note' => fake()->sentence(),
        ];
    }
}
