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
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'transaction_title' => fake()->word(),
            'description' => fake()->sentence(),
            'status' => fake()->randomElement(['authorized', 'pending', 'posted', 'settled', 'cancelled', 'voided', 'refunded', 'returned']),
            'total_amount' => fake()->randomFloat(2, 10, 1000),
            'transaction_number' => str_pad(fake()->unique()->randomNumber(8), 8, '0', STR_PAD_LEFT), // ensures 8 digits
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function withRandomPassword(): static
    {
        return $this->state(fn (array $attributes) => [
            'password' => Hash::make(fake()->password()),
        ]);
    }
}
