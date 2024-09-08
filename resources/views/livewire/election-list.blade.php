<div>
    <h1 class="mb-4 text-2xl font-bold">Upcoming Elections</h1>

    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Election Title</th>
                <th class="px-4 py-2">Start Date</th>
                <th class="px-4 py-2">End Date</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($elections as $election)
                <tr>
                    <td class="px-4 py-2 border">{{ $election->title }}</td>
                    <td class="px-4 py-2 border">{{ $election->start_date }}</td>
                    <td class="px-4 py-2 border">{{ $election->end_date }}</td>
                    <td class="px-4 py-2 border">
                        {{ $election->is_published ? 'Published' : 'Not Published' }}
                    </td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('election.results', ['electionId' => $election->id]) }}" class="text-blue-500">View Results</a>
                        <a href="{{ url('/elections/' . $election->id . '/candidates') }}" class="ml-4 text-blue-500">View Candidates</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
