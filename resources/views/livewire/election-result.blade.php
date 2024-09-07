<div>
    <h1 class="text-2xl font-bold mb-4">Election Results</h1>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Candidate</th>
                <th class="px-4 py-2">Votes Received</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td class="border px-4 py-2">{{ $result->candidate->name }}</td>
                    <td class="border px-4 py-2">{{ $result->votes_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
