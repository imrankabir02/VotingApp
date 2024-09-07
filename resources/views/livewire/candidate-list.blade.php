<div>
    <h1 class="text-2xl font-bold mb-4">Candidates for Election</h1>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Candidate Name</th>
                <th class="px-4 py-2">Party</th>
                <th class="px-4 py-2">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $candidate)
                <tr>
                    <td class="border px-4 py-2">{{ $candidate->name }}</td>
                    <td class="border px-4 py-2">{{ $candidate->party }}</td>
                    <td class="border px-4 py-2">{{ $candidate->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
