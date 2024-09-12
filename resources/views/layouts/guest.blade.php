<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VotingApp') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center items-center">

    <div class="max-w-2xl mx-auto mt-10 bg-gradient-to-r from-purple-600 via-indigo-500 to-purple-800 p-8 rounded-lg shadow-lg">
        {{ $slot }}
    </div>

</body>

</html>
