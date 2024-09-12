<div class="p-6">
    @if($isPublished)
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Election Results') }}
    </h2>

    <div class="mt-4">
        @if($winner)
            <h3 class="text-lg font-bold text-green-600">
                Winner: {{ $winner->candidate->name }} ({{ $winner->votes_count }} votes)
            </h3>
        @else
            <p>No winner declared yet.</p>
        @endif
    </div>


    <table class="min-w-full mt-6 divide-y divide-gray-200">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Candidate
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Votes
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
            @foreach($results as $result)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $result->candidate->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $result->votes_count }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>{{ __('The results have not been published yet.') }}</p>
    @endif
</div>
