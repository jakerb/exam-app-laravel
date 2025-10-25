@extends('layouts.app')

@section('content')

    <div class="mb-6">
        <p class="mt-2 text-xs text-gray-800 font-bold uppercase">Editing Exam</p>
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
            <form action="{{ route('exams.update', $exam) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" class="form-input" value="{{ $exam->title }}" />
                        </div>

                        <div class="form-group">
                            <label for="start" class="form-label">Start Date/Time</label>
                            <input type="datetime-local" id="start" name="start" class="form-input" value="{{ $exam->start }}" />
                        </div>

                        <div class="form-group">
                            <label for="end" class="form-label">End Date/Time</label>
                            <input type="datetime-local" id="end" name="end" class="form-input" value="{{ $exam->end }}" />
                        </div>

                    </div>
                    <div>
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-input">
                                <option value="active" {{ $exam->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $exam->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-input">{{ $exam->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="minimum_score" class="form-label">Minimum Score</label>
                            <input type="number" min="0" max="100" id="minimum_score" name="minimum_score" class="form-input" value="{{ $exam->minimum_score }}" />
                            <p class="mt-2 text-xs text-gray-600">This score will be used to determine if the candidate has passed the exam.</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="flex gap-4">
                        <div>
                            <button type="submit" class="btn btn-primary w-full">
                                Update Exam
                            </button>
                        </div>
                        <div>
                            <a href="{{ route('exams.show', $exam) }}" class="btn btn-secondary w-full text-center">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
