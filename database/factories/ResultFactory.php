<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => \App\Models\Booking::factory(),
            'score' => fake()->numberBetween(0, 100),
        ];
    }

    public function bookings() {
        return $this->belongsTo(\App\Models\Booking::class);
    }
}
