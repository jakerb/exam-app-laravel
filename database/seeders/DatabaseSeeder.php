<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Exam;
use App\Models\Booking;
use App\Models\Result;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $bookings = [];

        Exam::factory(10)->create()->each(function ($exam) {
            // For each exam, create between 1 and 5 bookings

            Booking::factory(rand(1, 5))->create([
                'exam_id' => $exam->id
            ])->each(function ($booking) use ($exam) {
                // // For each booking, create a result

                $bookings[] = $booking->id;

                if($exam->start->isBefore(now())) {
                    Result::factory()->create([
                        'booking_id' => $booking->id,
                        'score' => rand(10, 100),
                    ]);

                }

                
            });
        });

        // Assign multiple users to existing bookings
        User::factory(4)->create()->each(function ($user) use ($bookings) {
            // Assign bookings to users
            $userBookings = array_splice($bookings, 0, rand(1, 3));
            foreach ($userBookings as $bookingId) {
                $booking = Booking::find($bookingId);
                $booking->user_id = $user->id;
                $booking->save();
            }
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);


    }
}
