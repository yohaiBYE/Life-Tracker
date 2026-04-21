<?php

namespace Database\Factories;

use App\Models\HomeworkTask;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HomeworkTask>
 */
class HomeworkTaskFactory extends Factory
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
            'subject' => fake()->randomElement(['Math', 'Science', 'History', 'Literature', 'Art']),
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'due_date' => fake()->dateTimeBetween('now', '+1 month'),
            'status' => fake()->randomElement(['pending', 'done']),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
        ];
    }
}
