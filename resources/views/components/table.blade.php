<div class="overflow-x-auto rounded border border-gray-300 shadow-sm">
  <table class="min-w-full divide-y-2 divide-gray-200">
    <thead class="ltr:text-left rtl:text-right">
      <tr class="*:font-medium *:text-gray-900">
        @foreach($headers as $header)
          <th class="px-3 py-2 whitespace-nowrap">{{ $header }}</th>
        @endforeach
      </tr>
    </thead>
    @foreach($rows as $row)
    <tbody class="divide-y divide-gray-200">
      <tr class="*:text-gray-900 *:first:font-medium">
        @foreach($row as $cell)
          <td class="px-3 py-2 whitespace-nowrap">{{ $cell }}</td>
        @endforeach
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
