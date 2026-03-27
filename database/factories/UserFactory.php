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
            'username' => fake()->unique()->userName(),
            'fullname' => fake()->name(),
            'password' => static::$password ??= Hash::make('password'),
            'bio' => fake()->sentence(),
            'avatar' => fake()->imageUrl(100, 100, 'people'),
            'isAdmin' => 0,
            'isActived' => 1,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's user is an admin.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'isAdmin' => 1,
        ]);
    }
}
