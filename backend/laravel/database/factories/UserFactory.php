<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'login' => fake()->unique()->userName,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('Password1@123456'),
        ];
    }

    public function unverified(string $login = 'unverified'): Factory
    {
        return $this->state(function (array $attributes) use ($login) {
            return [
                'email' => "{$login}@gmail.com",
                'login' => $login,
                'email_verified_at' => null
            ];
        });
    }

    public function user(string $login = 'user'): Factory
    {
        return $this->state(function (array $attributes) use ($login) {
            return [
                'email' => "{$login}@gmail.com",
                'login' => $login,
            ];
        })->afterCreating(function (User $user) {
            $user->assignRole('authenticated user');
            $user->markEmailAsVerified();
        });
    }

    public function employee(string $login = 'employee'): Factory
    {
        return $this->state(function (array $attributes) use ($login) {
            return [
                'email' => "{$login}@gmail.com",
                'login' => $login,
            ];
        })->afterCreating(function (User $user) {
            $user->assignRole('authenticated user');
            $user->assignRole('employee');
            $user->markEmailAsVerified();
        });
    }

    public function admin(string $login = 'admin'): Factory
    {
        return $this->state(function (array $attributes) use ($login) {
            return [
                'email' => "{$login}@gmail.com",
                'login' => $login
            ];
        })->afterCreating(function (User $user) {
            $user->assignRole('authenticated user');
            $user->assignRole('employee');
            $user->assignRole('admin');
            $user->markEmailAsVerified();
        });
    }

}
