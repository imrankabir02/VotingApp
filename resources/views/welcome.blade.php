<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Voting App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }

        .welcome-section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .welcome-container {
            text-align: center;
            max-width: 600px;
        }

        .welcome-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .welcome-text {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .welcome-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .welcome-button {
            padding: 0.75rem 1.5rem;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 8px;
            text-transform: uppercase;
            transition: background 0.3s;
        }

        .login-button {
            background-color: #fff;
            color: #764ba2;
        }

        .register-button {
            background-color: #764ba2;
            color: white;
        }

        .login-button:hover {
            background-color: #f3f4f6;
        }

        .register-button:hover {
            background-color: #663399;
        }
    </style>
</head>

<body class="antialiased font-sans">
    <div class="welcome-section">
        <div class="welcome-container">
            <h1 class="welcome-title">Welcome to the Voting App</h1>
            <p class="welcome-text">A modern platform for casting your vote with ease and security. Join us and make your vote count!</p>
            <div class="welcome-buttons">
                <a href="{{ route('login') }}" class="welcome-button login-button">Login</a>
                <a href="{{ route('register') }}" class="welcome-button register-button">Register</a>
            </div>
        </div>
    </div>

    <footer class="py-6 text-center text-white">
        <p>&copy; 2024 Voting App. All rights reserved.</p>
    </footer>
</body>

</html>
