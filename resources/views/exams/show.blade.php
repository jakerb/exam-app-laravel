@extends('layouts.app')

@section('content')

<div class="mb-6">
    <p class="mt-2 text-xs text-gray-800 font-bold uppercase">Viewing Exam</p>
    <h1>{{ $exam->title }}</h1>
</div>



<div class="grid grid-cols-1 gap-4 md:grid-cols-2">   
    <div>
        <p class="mb-2 text-xs text-gray-800 font-bold uppercase">Exam Details</p>
        <div class="flow-root">
            <dl class="divide-y bg-white divide-gray-200 rounded border border-gray-200 text-sm">
                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Title</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $exam->title }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Start Date</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $exam->start->format('d/m/Y H:i') }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">End Date</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $exam->end->format('d/m/Y H:i') }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Minimum Score to Pass</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $exam->minimum_score }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Status</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        @if($exam->isActive())
                            <span class="text-green-600">Active</span>
                        @else
                            <span class="text-gray-600">Inactive</span>
                        @endif
                    </dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Description</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{ $exam->description }}
                    </dd>
                </div>
            </dl>
            </div>
    </div>
    <div>
        <p class="mb-2 text-xs text-gray-800 font-bold uppercase">Bookings</p>
        <div class="overflow-x-auto bg-white rounded border border-gray-200 text-sm">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900">
                    <th class="px-3 py-2 whitespace-nowrap">Candidate</th>
                    <th class="px-3 py-2 whitespace-nowrap">Status</th>
                    <th class="px-3 py-2 whitespace-nowrap">Score</th>
                    <th class="px-3 py-2 whitespace-nowrap">Action</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach($bookings as $booking)
                        <tr class="*:text-gray-900 *:first:font-medium">
                            <td class="px-3 py-2 whitespace-nowrap">{{ $booking->user->name }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                @if($booking->hasResult())
                                    @if($booking->result->hasPassed())
                                        <span class="text-green-600 font-medium">Passed</span>
                                    @else
                                        <span class="text-red-600 font-medium">Failed</span>
                                    @endif
                                @else
                                    <span class="text-gray-400">No Status</span>
                                @endif
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                @if($booking->hasResult())
                                    {{ $booking->result->score ?? '' }}
                                @else
                                    <span class="text-gray-400">Pending</span>
                                @endif
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <a href="{{ route('booking.view', $booking) }}" class="text-blue-600 hover:underline">
                                    @if($booking->hasResult() && $booking->result->hasFailed())
                                    Re-book
                                    @else 
                                    View
                                    @endif
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>

</div>

@endsection