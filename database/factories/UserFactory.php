<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            // 'number_documment' => $this->faker->numberBetween(10000000, 99999999),
            // 'name' => $this->faker->name,
            // 'last_name' => $this->faker->lastName,
            // 'email' => $this->faker->unique()->safeEmail,
            // 'iphone' => $this->faker->numberBetween(10000000, 99999999),
            // 'status' => 'Activo',
            // 'image' => null,
            // 'typeDocumment' => $this->faker->randomElement(['CC', 'TI']),
            // 'password' => bcrypt('bethlemitas123'),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
