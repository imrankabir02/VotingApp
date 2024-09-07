<div>
    <h2 class="text-2xl font-bold mb-4">Manage Candidates</h2>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-4">{{ session('message') }}</div>
    @endif

    @if ($updateMode)
        <h3 class="text-xl font-bold mb-4">Edit Candidate</h3>
    @else
        <h3 class="text-xl font-bold mb-4">Create New Candidate</h3>
    @endif

    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2">Name</label>
            <input type="text" wire:model="name" id="name" class="w-full p-2 border">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="party" class="block text-sm font-bold mb-2">Party</label>
            <input type="text" wire:model="party" id="party" class="w-full p-2 border">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-bold mb-2">Description</label>
            <textarea wire:model="description" id="description" class="w-full p-2 border"></textarea>
        </div>

        <div class="mb-4">
            <label for="election_id" class="block text-sm font-bold mb-2">Election</label>
            <select wire:model="election_id" id="election_id" class="w-full p-2 border">
                <option value="">Select an election</option>
                @foreach ($elections as $election)
                    <option value="{{ $election->id }}">{{ $election->title }}</option>
                @endforeach
            </select>
            @error('election_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">
            {{ $updateMode ? 'Update Candidate' : 'Create Candidate' }}
        </button>
    </form>

    <hr class="my-6">

    <h3 class="text-xl font-bold mb-4">Candidates List</h3>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Party</th>
                <th class="px-4 py-2">Election</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $candidate)
                <tr>
                    <td class="border px-4 py-2">{{ $candidate->name }}</td>
                    <td class="border px-4 py-2">{{ $candidate->party }}</td>
                    <td class="border px-4 py-2">{{ $candidate->election->title }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $candidate->id }})" class="bg-yellow-500 text-white px-2 py-1">Edit</button>
                        <button wire:click="delete({{ $candidate->id }})" class="bg-red-500 text-white px-2 py-1">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
