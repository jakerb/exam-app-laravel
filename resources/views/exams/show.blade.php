@extends('layouts.app')

@section('content')

<div class="mb-6">
    <p class="mt-2 text-xs text-gray-800 font-bold uppercase">Viewing Exam</p>
    <h1>{{ $exam->title }}</h1>
</div>



<div class="grid grid-cols-1 gap-4 md:grid-cols-2">   
    <div>
        <p class="mb-2 text-xs text-gray-800 font-bold uppercase">Exam Details</p>
        <x-exam-card :exam="$exam" />
    </div>
    <div>
        <p class="mb-2 text-xs text-gray-800 font-bold uppercase">Bookings</p>
        <div class="overflow-x-auto bg-white rounded border border-gray-200 text-sm">
            @if($bookings->isEmpty())
                <p class="p-4 text-gray-500">No bookings found for this exam.</p>
            @else
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
                                <a href="{{ route('bookings.show', $booking) }}" class="text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            <div class="p-4">
                {{ $bookings->links() }}
            </div>
        </div>
        <div class="mt-4">
            <div class="inline-flex text-sm bg-white">
                
                <a
                    
                    href="{{ route('exams.edit', $exam) }}"
                    class="rounded-l-sm border border-gray-200 px-3 py-2 text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white focus:outline-none disabled:pointer-events-auto disabled:opacity-50">
                    Edit Exam
                </a>
                @if($exam->isActive())
                <a
                    href="{{ url('/dashboard/bookings/create/'.$exam->id) }}"
                    class="-ml-px border border-gray-200 px-3 py-2 text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white focus:outline-none disabled:pointer-events-auto disabled:opacity-50">
                    Create Booking
                </a>
                @endif

                <form action="{{ route('exams.destroy', $exam) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="cursor-pointer -ml-px rounded-r-sm border border-red-200 px-3 py-2 text-red-700 transition-colors hover:bg-red-50 hover:text-red-900 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white focus:outline-none disabled:pointer-events-auto disabled:opacity-50">
                        Delete Exam
                    </button>
                </form>
            </div>

        </div>
    </div>

</div>

@endsection