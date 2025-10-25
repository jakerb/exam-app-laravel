@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h1 class="mt-2 text-xs text-gray-800 font-bold uppercase">Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>

<div class="grid my-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 bg-gray-100">
    @foreach($stats as $stat)
        <x-stat-card :stat="$stat" />
    @endforeach
</div>

<div>
    <h2 class="mb-2 text-xs text-gray-800 font-bold uppercase">Upcoming Exams</h2>
    <div class="overflow-x-auto bg-white rounded border border-gray-200">
        <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
            <thead class="ltr:text-left rtl:text-right">
            <tr class=" *:text-gray-900">
                <th class="px-3 py-2 whitespace-nowrap">Title</th>
                <th class="px-3 py-2 whitespace-nowrap">Start</th>
                <th class="px-3 py-2 whitespace-nowrap">End</th>
                <th class="px-3 py-2 whitespace-nowrap">Duration</th>
                <th class="px-3 py-2 whitespace-nowrap">Bookings</th>
                <th class="px-3 py-2 whitespace-nowrap">Action</th>
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach($exams as $exam)
                    <tr class="*:text-gray-900">
                        <td class="px-3 py-2 whitespace-nowrap">{{ $exam->title }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $exam->start->format('d/m/Y H:i') }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $exam->end->format('d/m/Y H:i') }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $exam->durationInMinutes() }} mins</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $exam->bookingsCount() }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <a href="{{ route('exams.view', $exam) }}" class="text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">
            {{ $exams->links() }}
        </div>
    </div>

</div>
@endsection