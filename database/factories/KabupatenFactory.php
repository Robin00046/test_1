<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kabupaten>
 */
class KabupatenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama' => $this->faker->city,
            'provinsi_id' => \App\Models\Provinsi::factory(), // Assuming you
            // have a Provinsi factory to create related Provinsi records
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
