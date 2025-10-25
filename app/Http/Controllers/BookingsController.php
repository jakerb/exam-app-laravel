<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(\App\Models\Exam $exam)
    {   
        return view('bookings.create', [
            'booking' => new Booking(),
            'exam' => $exam,
            'users' => \App\Models\User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {

        $existingBooking = Booking::where('exam_id', $request->exam_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($existingBooking) {
            return redirect()->back()->withErrors(['user_id' => 'This user has already booked this exam.']);
        }

        $booking = Booking::create($request->validated());

        return redirect()->route('exams.show', $booking->exam->id)->with('status', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {

        return view('bookings.show', ['booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit', ['booking' => $booking]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('exams.show', $booking->exam->id)->with('status', 'Booking deleted successfully.');
    }
}
