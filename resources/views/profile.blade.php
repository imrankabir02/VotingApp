<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4 text-2xl font-bold">Profile Details</h3>
                    <ul>
                        <li><strong>Username:</strong> {{ auth()->user()->username }}</li>
                        <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
                        <li><strong>Role:</strong> {{ ucfirst(auth()->user()->role) }}</li>
                        <li><strong>Active Status:</strong> {{ auth()->user()->is_active ? 'Active' : 'Inactive' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
