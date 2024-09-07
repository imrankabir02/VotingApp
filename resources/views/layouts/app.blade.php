<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <nav class="bg-gray-800 p-4 text-white">
        <div class="container mx-auto">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/elections') }}" class="ml-4">Elections</a>
        </div>
    </nav>

    <main class="container mx-auto py-4">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
