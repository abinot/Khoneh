<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Primary Meta Tags --}}
    <title>سوپال | مدیریت رستوران و دفتر حقوقی</title>
    <meta name="description" content="سوپال — پلتفرم چندمستاجری مدیریت رستوران، فست‌فود و دفتر حقوقی. منوی دیجیتال، سفارش آنلاین، CRM، گزارش‌فروش.">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="سوپال | مدیریت رستوران و دفتر حقوقی">
    <meta property="og:description" content="چندمستاجری ساده برای رستوران‌ها و دفترهای حقوقی. منوی دیجیتال، سفارش آنلاین، CRM و گزارش فروش.">
    <meta property="og:image" content="{{ asset('images/og-sopal.png') }}">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="سوپال | مدیریت رستوران و دفتر حقوقی">
    <meta property="twitter:description" content="چندمستاجری ساده برای رستوران‌ها و دفترهای حقوقی.">
    <meta property="twitter:image" content="{{ asset('images/og-sopal.png') }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url('/') }}">

    {{-- Vazirmatn Font (Iran-friendly CDN) --}}
    <link rel="preconnect" href="https://fonts.b-cdn.net">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.b-cdn.net/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/css/animations.css', 'resources/js/app.js'])

    {{-- Livewire --}}
    @livewireStyles

    {{-- Per-page head content (title, OG, structured data) --}}
    @stack('head')

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
</head>
<body class="bg-neutral-50 text-neutral-800 font-vazirmatn antialiased overflow-x-hidden">
    @include('livewire.components.nav')

    @yield('content')

    {{-- Livewire --}}
    @livewireScripts

    {{-- Alpine.js plugins (must load before core) --}}
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>

    {{-- Alpine.js (must be after Livewire) --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
