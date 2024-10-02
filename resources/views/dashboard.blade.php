{{-- <x-app-layout> --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Overview Stats Section -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="p-6 overflow-hidden text-gray-900 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg dark:text-gray-100">
                    <h3 class="text-lg font-semibold">{{ __('Total Elections') }}</h3>
                    {{-- <p class="mt-2 text-3xl font-bold">{{ $totalElections }}</p> --}}
                </div>
                <div class="p-6 overflow-hidden text-gray-900 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg dark:text-gray-100">
                    <h3 class="text-lg font-semibold">{{ __('Total Candidates') }}</h3>
                    {{-- <p class="mt-2 text-3xl font-bold">{{ $totalCandidates }}</p> --}}
                </div>
                <div class="p-6 overflow-hidden text-gray-900 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg dark:text-gray-100">
                    <h3 class="text-lg font-semibold">{{ __('Upcoming Elections') }}</h3>
                    {{-- <p class="mt-2 text-3xl font-bold">{{ $upcomingElections }}</p> --}}
                </div>
                <div class="p-6 overflow-hidden text-gray-900 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg dark:text-gray-100">
                    <h3 class="text-lg font-semibold">{{ __('Recent Results') }}</h3>
                    {{-- <p class="mt-2 text-3xl font-bold">{{ $recentResults }}</p> --}}
                </div>
            </div>

            <!-- Action Links Section -->
            <div class="mt-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4 text-lg font-semibold">{{ __("Quick Actions") }}</h3>
                    <a href="{{ route('admin.elections') }}" class="text-blue-500 underline">{{ __('Manage Elections') }}</a>
                    <a href="{{ route('admin.candidates') }}" class="ml-4 text-blue-500 underline">{{ __('Manage Candidates') }}</a>
                </div>
            </div>
        </div>
    </div>
{{-- </x-app-layout> --}}
