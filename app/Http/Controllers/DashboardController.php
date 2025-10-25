<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        return view('dashboard', [
            'exams' => \App\Models\Exam::getUpcoming()->paginate(10),
            'stats' => [
                [
                    'title' => 'Total Exams',
                    'value' => \App\Models\Exam::count(),
                ],
                [
                    'title' => 'Upcoming Exams',
                    'value' => \App\Models\Exam::getUpcoming()->count(),
                ],
                [
                    'title' => 'Total Bookings',
                    'value' => \App\Models\Booking::count(),
                ],
                [
                    'title' => 'Total Results',
                    'value' => \App\Models\Result::count(),
                ],
            ],
        ]);
    }
}

