<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Voter Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as Voter!") }}
                </div>
                <div class="mt-4">
                    <a href="{{ route('voter.elections') }}" class="text-blue-500 underline">View Elections</a>
                    <a href="{{ route('voter.vote', ['electionId' => 1]) }}" class="ml-4 text-blue-500 underline">Cast Vote</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
