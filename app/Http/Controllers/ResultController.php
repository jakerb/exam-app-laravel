<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Result;

class ResultController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultRequest $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'score' => 'required|integer|min:0|max:100',
        ]);

        Result::create($request->validated());

        return redirect('/dashboard/bookings/' . $request->booking_id)->with('status', 'Result created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResultRequest $request, Result $result) {

        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'score' => 'required|integer|min:0|max:100',
        ]);

        $result->update($request->validated());

        return redirect('/dashboard/bookings/' . $result->booking_id)->with('status', 'Result updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->back()->with('status', 'Result deleted successfully.');
    }
}
