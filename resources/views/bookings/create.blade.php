@extends('layouts.app')

@section('content')

    <div class="mb-6">
        <p class="mt-2 text-xs text-gray-800 font-bold uppercase">Create Booking</p>
        <h1>{{ $exam->title }}</h1>
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
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <input type="hidden" name="exam_id" value="{{ $exam->id }}" />
                <div class="form-group">
                    <label for="user_id" class="form-label">Candidate</label>
                    <select id="user_id" name="user_id" class="form-input" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <div class="flex gap-4">
                        <div>
                            <button type="submit" class="btn btn-primary w-full">
                                Create Booking
                            </button>
                        </div>
                        <div>
                            <a href="{{ route('bookings.index') }}" class="btn btn-secondary w-full text-center">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
