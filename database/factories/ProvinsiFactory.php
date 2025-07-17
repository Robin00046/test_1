<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provinsi>
 */
class ProvinsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Define the default state for the Provinsi model
            'nama' => $this->faker->state, // Generate a random state name
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
