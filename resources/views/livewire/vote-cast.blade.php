<div>
    <h1 class="text-2xl font-bold mb-4">Cast Your Vote</h1>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-4">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="castVote">
        <div class="mb-4">
            <label for="candidate" class="block text-sm font-bold mb-2">Choose Candidate:</label>
            <select wire:model="candidateId" id="candidate" class="w-full p-2 border">
                <option value="">Select a candidate</option>
                @foreach ($candidates as $candidate)
                    <option value="{{ $candidate->id }}">{{ $candidate->name }} ({{ $candidate->party }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Cast Vote</button>
    </form>
</div>
