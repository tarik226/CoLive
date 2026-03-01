<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CoLive - Shared Living') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        /* Smooth transitions for inputs */
        input {
            transition: all 0.2s ease-in-out;
        }
    </style>
</head>
<body class="antialiased text-gray-900 bg-white">
    
    <main>
        {{ $slot }}
    </main>

    <!-- @if (session('status'))
        <div class="fixed bottom-5 right-5 bg-indigo-600 text-white px-6 py-3 rounded-xl shadow-2xl animate-bounce">
            {{ session('status') }}
        </div>
    @endif -->

</body>
</html>