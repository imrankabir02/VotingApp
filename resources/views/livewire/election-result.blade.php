<!-- resources/views/livewire/election-result.blade.php -->
<div>
    <h2 class="mb-4 text-2xl font-bold">Election Results</h2>

    @if ($isPublished)
        @if ($results && $results->count() > 0)
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Candidate</th>
                        <th class="px-4 py-2">Votes Received</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td class="px-4 py-2 border">{{ $result->candidate->name }}</td>
                            <td class="px-4 py-2 border">{{ $result->votes_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No results available.</p>
        @endif
    @else
        <p>The election results have not been published yet.</p>
    @endif
</div>
