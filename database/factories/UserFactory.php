<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'name' => 'Administrador',
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            'username' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'rol' => 'ADMIN',
            // 'remember_token' => Str::random(10),
        ];
    }

    public function survey()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Survey',
                // 'email' => fake()->unique()->safeEmail(),
                // 'email_verified_at' => now(),
                'username' => 'survey',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'rol' => 'SURVEY',
                // 'remember_token' => Str::random(10),
            ];
        });
    }
    public function larzzz()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Luis Alejandro Roddriguez Zavalza',
                // 'email' => fake()->unique()->safeEmail(),
                // 'email_verified_at' => now(),
                'username' => 'larzzz17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'rol' => 'SURVEY',
                // 'remember_token' => Str::random(10),
            ];
        });
    }
    public function osmarlg()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Osmar Alejandro Liera Gómez',
                // 'email' => fake()->unique()->safeEmail(),
                // 'email_verified_at' => now(),
                'username' => 'osmarlg',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'rol' => 'SURVEY',
                // 'remember_token' => Str::random(10),
            ];
        });
    }
    public function fantasticjaac()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'José Antonio Aguila Cuevas',
                // 'email' => fake()->unique()->safeEmail(),
                // 'email_verified_at' => now(),
                'username' => 'fantasticjaac',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'rol' => 'SURVEY',
                // 'remember_token' => Str::random(10),
            ];
        });
    }
    public function sprinfil()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Jeremy Ivan Ojeda Ceseña',
                // 'email' => fake()->unique()->safeEmail(),
                // 'email_verified_at' => now(),
                'username' => 'sprinfil',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'rol' => 'SURVEY',
                // 'remember_token' => Str::random(10),
            ];
        });
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
