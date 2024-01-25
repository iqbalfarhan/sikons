<?php

namespace Database\Factories;

use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lokasi_id' => fake()->randomElement(Lokasi::pluck('id')),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'tanggal' => now(),
            'waktu' => fake()->randomElement(['pagi', 'sore', 'malam']),
            'lingkungan' => fake()->randomElement(['aman', 'tidak aman']),
            'bbm' => fake()->randomElement(['aman', 'tidak aman']),
            'perangkat' => fake()->randomElement(['aman', 'tidak aman']),
            'apar' => fake()->randomElement(['aman', 'tidak aman']),
            'apd' => fake()->randomElement(['aman', 'tidak aman']),
            'cuaca' => fake()->randomElement(['cerah', 'mendung', 'hujan ringan', 'hujan berat']),
            'pln' => fake()->randomElement(['on', 'off']),
            'genset' => fake()->randomElement(['on', 'off']),
            'gedung' => fake()->randomElement(['normal', 'bocor', 'rusak']),
            'ev_lingkungan' => fake()->sentence(),
            'ev_gedung' => fake()->sentence(),
            'catatan' => fake()->sentence(),
            'score' => fake()->randomElement([1, 2, 3]),
        ];
    }
}
