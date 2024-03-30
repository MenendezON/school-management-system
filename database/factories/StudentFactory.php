<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->word,
            'place_of_birth' => $this->faker->word,
            'user_id' => User::factory(),
            'date_of_birth' =>now(),
            'address' => $this->faker->address,
            'city' => $this->faker->word,
            'email' => fake()->unique()->safeEmail(),
            'phone' => $this->faker->word
        ];
    }
}
