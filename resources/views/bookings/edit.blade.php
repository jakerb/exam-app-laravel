@extends('layouts.app')

@section('content')

    <div class="mb-6">
        <p class="mt-2 text-xs text-gray-800 font-bold uppercase">Editing Booking</p>
        <h1>{{ $booking->user->name }} - {{ $booking->exam->title }}</h1>
    </div>

    @if ($errors->any())
        <div class="mb-4">
            <ul class="list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 gap-4 md:grid-cols-1">
        <div>
            <p class="mt-2 text-xs text-gray-800 font-bold uppercase">Edit Result</p>
            @if($booking->hasResult())
                <form action="{{ route('results.update', $booking->result) }}" method="POST">
                <input type="hidden" name="booking_id" value="{{ $booking->id }}" />
                @method('PUT')
                @csrf
            @else
                <form action="{{ route('results.store') }}" method="POST">
                <input type="hidden" name="booking_id" value="{{ $booking->id }}" />
                @method('POST')
                @csrf
            @endif
                <div class="form-group">
                    <label for="score" class="form-label">Score</label>
                    <input type="number" min="0" max="100" id="score" name="score" class="form-input" value="{{ $booking->hasResult() ? $booking->result->score : '' }}" />
                    <p class="mt-2 text-xs text-gray-600">Enter the score for the exam result.</p>
                </div>

                <div class="form-group">
                    <div class="flex gap-4">
                        <div>
                            <button type="submit" class="btn btn-primary w-full">
                                {{ $booking->hasResult() ? 'Update Result' : 'Create Result' }}
                            </button>
                        </div>
                        <div>
                            <a href="{{ route('bookings.show', $booking) }}" class="btn btn-secondary w-full text-center">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
