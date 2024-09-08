<div>
    <h2 class="mb-4 text-2xl font-bold">Manage Elections</h2>

    @if (session()->has('message'))
        <div class="p-4 mb-4 text-white bg-green-500">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="p-4 mb-4 text-white bg-red-500">{{ session('error') }}</div>
    @endif

    @if ($updateMode)
        <h3 class="mb-4 text-xl font-bold">Edit Election</h3>
    @else
        <h3 class="mb-4 text-xl font-bold">Create New Election</h3>
    @endif

    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="mb-4">
            <label for="title" class="block mb-2 text-sm font-bold">Title</label>
            <input type="text" wire:model="title" id="title" class="w-full p-2 border">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="start_date" class="block mb-2 text-sm font-bold">Start Date</label>
            <input type="date" wire:model="start_date" id="start_date" class="w-full p-2 border">
            @error('start_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="end_date" class="block mb-2 text-sm font-bold">End Date</label>
            <input type="date" wire:model="end_date" id="end_date" class="w-full p-2 border">
            @error('end_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <input type="checkbox" wire:model="is_published" id="is_published">
            <label for="is_published">Publish?</label>
        </div>

        <button type="submit" class="px-4 py-2 text-white bg-blue-500">
            {{ $updateMode ? 'Update Election' : 'Create Election' }}
        </button>
    </form>

    <hr class="my-6">

    <h3 class="mb-4 text-xl font-bold">Elections List</h3>

    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Start Date</th>
                <th class="px-4 py-2">End Date</th>
                <th class="px-4 py-2">Published</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($elections as $election)
                <tr>
                    <td class="px-4 py-2 border">{{ $election->title }}</td>
                    <td class="px-4 py-2 border">{{ $election->start_date }}</td>
                    <td class="px-4 py-2 border">{{ $election->end_date }}</td>
                    <td class="px-4 py-2 border">{{ $election->is_published ? 'Yes' : 'No' }}</td>
                    <td class="px-4 py-2 border">
                        <button wire:click="edit({{ $election->id }})" class="px-2 py-1 text-white bg-yellow-500">Edit</button>
                        <button wire:click="delete({{ $election->id }})" class="px-2 py-1 text-white bg-red-500">Delete</button>
                        @if (!$election->results_published && now()->greaterThan($election->end_date))
                            <button wire:click="publishResults({{ $election->id }})" class="px-2 py-1 text-white bg-green-500">Publish Results</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
