<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_number' => fake()->unique()->bothify('ORDER-#####'),
            'customer_id' => User::factory(), // Génère un utilisateur associé si aucun n'est fourni
            'status' => fake()->randomElement(['pending', 'completed', 'canceled']),
            'total' => fake()->randomFloat(2, 10, 1000), // Total entre 10 et 1000 avec 2 décimales
        ];
    }
}
