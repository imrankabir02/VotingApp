<div>
    <h1 class="text-2xl font-bold mb-4">Upcoming Elections</h1>
    <table class="table-auto w-full">
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
                    <td class="border px-4 py-2">{{ $election->title }}</td>
                    <td class="border px-4 py-2">{{ $election->start_date }}</td>
                    <td class="border px-4 py-2">{{ $election->end_date }}</td>
                    <td class="border px-4 py-2">
                        {{ $election->is_published ? 'Published' : 'Not Published' }}
                    </td>
                    <td class="border px-4 py-2">
                        <a href="{{ url('/elections/' . $election->id . '/candidates') }}" class="text-blue-500">View Candidates</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
