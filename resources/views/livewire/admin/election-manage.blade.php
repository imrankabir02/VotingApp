<div>
    <h2 class="text-2xl font-bold mb-4">Manage Elections</h2>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-4">{{ session('message') }}</div>
    @endif

    @if ($updateMode)
        <h3 class="text-xl font-bold mb-4">Edit Election</h3>
    @else
        <h3 class="text-xl font-bold mb-4">Create New Election</h3>
    @endif

    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="mb-4">
            <label for="title" class="block text-sm font-bold mb-2">Title</label>
            <input type="text" wire:model="title" id="title" class="w-full p-2 border">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-sm font-bold mb-2">Start Date</label>
            <input type="date" wire:model="start_date" id="start_date" class="w-full p-2 border">
            @error('start_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-sm font-bold mb-2">End Date</label>
            <input type="date" wire:model="end_date" id="end_date" class="w-full p-2 border">
            @error('end_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <input type="checkbox" wire:model="is_published" id="is_published">
            <label for="is_published">Publish?</label>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">
            {{ $updateMode ? 'Update Election' : 'Create Election' }}
        </button>
    </form>

    <hr class="my-6">

    <h3 class="text-xl font-bold mb-4">Elections List</h3>

    <table class="table-auto w-full">
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
                    <td class="border px-4 py-2">{{ $election->title }}</td>
                    <td class="border px-4 py-2">{{ $election->start_date }}</td>
                    <td class="border px-4 py-2">{{ $election->end_date }}</td>
                    <td class="border px-4 py-2">{{ $election->is_published ? 'Yes' : 'No' }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $election->id }})" class="bg-yellow-500 text-white px-2 py-1">Edit</button>
                        <button wire:click="delete({{ $election->id }})" class="bg-red-500 text-white px-2 py-1">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
