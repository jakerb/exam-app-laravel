<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $start = fake()->dateTimeBetween('-30 days', '+1 month')->format('Y-m-d H:i:s');
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $start)->addHour();
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'start' => $start,
            'end' => $end,
            'minimum_score' => fake()->numberBetween(0, 100),
            'status' => Carbon::createFromFormat('Y-m-d H:i:s', $end)->isPast() ? 'inactive' : 'active',
        ];
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
