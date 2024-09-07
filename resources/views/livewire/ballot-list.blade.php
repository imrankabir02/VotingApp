<div>
    <h1 class="text-2xl font-bold mb-4">Ballots for Election</h1>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Ballot ID</th>
                <th class="px-4 py-2">Voter ID</th>
                <th class="px-4 py-2">Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ballots as $ballot)
                <tr>
                    <td class="border px-4 py-2">{{ $ballot->id }}</td>
                    <td class="border px-4 py-2">{{ $ballot->voter_id }}</td>
                    <td class="border px-4 py-2">{{ $ballot->submitted_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
