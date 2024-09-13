<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VotingApp') }}</title>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center min-h-screen font-sans bg-gray-100 dark:bg-gray-900">

    <div class="max-w-2xl p-8 mx-auto mt-10 rounded-lg shadow-lg bg-gradient-to-r from-purple-600 via-indigo-500 to-purple-800">
        {{ $slot }}
    </div>

</body>

</html>
