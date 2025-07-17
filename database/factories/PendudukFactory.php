<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
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
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'kabupaten_id' => \App\Models\Kabupaten::factory(), // Assuming you
            // have a Kabupaten factory to create related Kabupaten records
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
