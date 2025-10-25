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