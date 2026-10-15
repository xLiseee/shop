<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #f8faf9 0%, #f1f7f3 100%);
        }

        .page-shell {
            background: linear-gradient(180deg, #ffffff 0%, #f8fbf8 100%);
        }
    </style>
</head>
<body>
    <x-shared.header />

    <main class="min-h-screen page-shell">
        {{ $slot }}
    </main>

    <x-shared.footer />

    @livewireScripts
</body>
</html>