<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Manage Elections') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4 text-xl font-bold">Elections List</h3>

                    @if (session()->has('message'))
                        <div class="p-4 mb-4 text-white bg-green-500">{{ session('message') }}</div>
                    @endif

                    @if (session()->has('error'))
                        <div class="p-4 mb-4 text-white bg-red-500">{{ session('error') }}</div>
                    @endif

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

                    <!-- Button to open modal -->
                    <button @click="isModalOpen = true" class="px-4 py-2 mt-4 text-white bg-blue-500">Create Election</button>

                    <!-- Modal for create/edit -->
                    <div x-data="{ isModalOpen: @entangle('isModalOpen') }">
                        <div x-show="isModalOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                            <div class="w-full max-w-lg p-6 bg-white rounded shadow-lg">
                                <h2 class="mb-4 text-xl font-semibold">{{ $updateMode ? 'Edit Election' : 'Create Election' }}</h2>

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

                                    <div class="flex justify-end space-x-2">
                                        <button type="button" @click="isModalOpen = false" class="px-4 py-2 text-white bg-gray-500">Cancel</button>
                                        <button type="submit" class="px-4 py-2 text-white bg-blue-500">{{ $updateMode ? 'Update' : 'Create' }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
