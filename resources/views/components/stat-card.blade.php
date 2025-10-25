<article class="flex flex-col gap-4 rounded-lg border border-gray-100 bg-white p-6">

  <div>
    <strong class="block text-sm font-medium text-gray-500"> {{ $stat['title'] ?? '' }} </strong>

    <p class="mt-2">
      <span class="text-2xl font-medium text-gray-900"> {{ $stat['value'] ?? 0 }} </span>
    </p>
  </div>
</article>