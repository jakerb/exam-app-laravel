@extends('layouts.app')

@section('content')

    <div class="mb-6">
        <p class="mt-2 text-xs text-gray-800 font-bold uppercase">Viewing Booking</p>
        <h1>{{ $booking->user->name }} - {{ $booking->exam->title }}</h1>
    </div>



    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div>
            <p class="mb-2 text-xs text-gray-800 font-bold uppercase">Exam Details</p>
            <x-exam-card :exam="$booking->exam" />
        </div>
        <div>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <p class="mb-2 text-xs text-gray-800 font-bold uppercase">Booking Details</p>
                    <div class="flow-root">
                        <dl class="divide-y bg-white divide-gray-200 rounded border border-gray-200 text-sm">
                            <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">Candidate</dt>
                                <dd class="text-gray-700 sm:col-span-2">{{ $booking->user->name }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div>
                    <p class="mb-2 text-xs text-gray-800 font-bold uppercase">Results Details</p>
                    <div class="flow-root">
                        <dl class="divide-y bg-white divide-gray-200 rounded border border-gray-200 text-sm">
                            <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">Score</dt>
                                <dd class="text-gray-700 sm:col-span-2">
                                    @if ($booking->hasResult())
                                        {{ $booking->result->score ?? '0' }}
                                    @else
                                        <span class="text-gray-400">Pending</span>
                                    @endif
                                </dd>
                            </div>

                            <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">Status</dt>
                                <dd class="text-gray-700 sm:col-span-2">
                                    @if ($booking->hasResult())
                                        @if ($booking->result->hasPassed())
                                            <span class="text-green-600">Passed</span>
                                        @else
                                            <span class="text-red-600">Failed</span>
                                        @endif
                                    @else
                                        <span class="text-gray-400">Pending</span>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="mt-4">
                        <div class="inline-flex text-sm bg-white">
                            <a
                                href="{{ route('exams.show', $booking->exam) }}"
                                class="rounded-l-sm border border-gray-200 px-3 py-2 text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white focus:outline-none disabled:pointer-events-auto disabled:opacity-50">
                                Back to Exam
                            </a>
                            @if(!$booking->hasResult() || $booking->hasResult() && $booking->result->hasFailed()) 
                            <a
                                href="{{ route('bookings.edit', $booking) }}"
                                
                                class="-ml-px border border-gray-200 px-3 py-2 text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white focus:outline-none disabled:pointer-events-auto disabled:opacity-50">
                                Edit Result
                            </a>
                            @endif

                            <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="cursor-pointer -ml-px rounded-r-sm border border-red-200 px-3 py-2 text-red-700 transition-colors hover:bg-red-50 hover:text-red-900 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white focus:outline-none disabled:pointer-events-auto disabled:opacity-50">
                                    Delete Booking
                                </button>
                            </form>
                        </div>

                        <p class="mt-2 text-xs text-gray-600">You can only edit the result if the candidate has failed the exam.</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
