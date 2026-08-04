<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>سوپال — مدیریت هوشمند رستوران و کسب‌وکار</title>

    {{-- Vazirmatn Font --}}
    <link rel="preconnect" href="https://fonts.b-cdn.net">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.b-cdn.net/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Tailwind & Alpine.js --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
</head>
<body class="font-sans antialiased bg-white dark:bg-gray-900">
    <div class="min-h-screen">
        {{ $slot }}
    </div>
</body>
</html>
