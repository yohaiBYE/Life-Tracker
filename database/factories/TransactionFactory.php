<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
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
            'amount' => fake()->randomFloat(2, 1, 5000),
            'type' => fake()->randomElement(['income', 'expense']),
            'category' => fake()->randomElement(['Food', 'Rent', 'Salary', 'Entertainment', 'Utilities']),
            'note' => fake()->sentence(),
            'transaction_date' => fake()->date(),
        ];
    }
}
