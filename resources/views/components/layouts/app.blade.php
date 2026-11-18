@props(['seo' => null, 'title' => null])

@php
    $siteName = config('agency.name');
    $pageTitle = $seo['title'] ?? ($title ? "{$title} | {$siteName}" : $siteName);
    $agentData = [
        'contactUrl' => route('contact'),
        'services' => collect($site['services'])->map(fn (array $service): array => [
            'title' => $service['title'],
            'summary' => $service['summary'],
            'url' => route('services.show', $service['slug']),
        ])->all(),
    ];
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle }}</title>

    @if ($seo)
        <meta name="description" content="{{ $seo['description'] }}">
        @if ($seo['keywords'])
            <meta name="keywords" content="{{ $seo['keywords'] }}">
        @endif
        <meta name="robots" content="{{ $seo['robots'] }}">
        <link rel="canonical" href="{{ $seo['canonical'] }}">
        <link rel="alternate" type="text/markdown" href="{{ $seo['markdown'] }}" title="Markdown version for AI agents">

        <meta property="og:site_name" content="{{ $siteName }}">
        <meta property="og:locale" content="en_KE">
        <meta property="og:locale:alternate" content="en_UG">
        <meta property="og:locale:alternate" content="en_TZ">
        <meta property="og:locale:alternate" content="en_NG">
        <meta property="og:locale:alternate" content="en_GH">
        <meta property="og:type" content="{{ $seo['type'] }}">
        <meta property="og:title" content="{{ $seo['title'] }}">
        <meta property="og:description" content="{{ $seo['description'] }}">
        <meta property="og:url" content="{{ $seo['canonical'] }}">
        <meta property="og:image" content="{{ $seo['image'] }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:alt" content="{{ $seo['image_alt'] }}">
        @if ($seo['published_time'])
            <meta property="article:published_time" content="{{ $seo['published_time'] }}">
            <meta property="article:modified_time" content="{{ $seo['modified_time'] }}">
        @endif

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo['title'] }}">
        <meta name="twitter:description" content="{{ $seo['description'] }}">
        <meta name="twitter:image" content="{{ $seo['image'] }}">

        @if ($seo['geo'])
            <meta name="geo.region" content="{{ $seo['geo']['region'] }}">
            <meta name="geo.placename" content="{{ $seo['geo']['placename'] }}">
            <meta name="geo.position" content="{{ $seo['geo']['position'] }}">
            <meta name="ICBM" content="{{ str_replace(';', ', ', $seo['geo']['position']) }}">
        @endif

        <script type="application/ld+json">{!! json_encode($seo['json_ld'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>
    @else
        <meta name="robots" content="noindex, nofollow">
    @endif

    <meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#060d1f" media="(prefers-color-scheme: dark)">
    <meta name="format-detection" content="telephone=no">

    <link rel="icon" href="{{ asset('favicons/favicon.ico') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('favicons/favicon.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
    <link rel="help" href="{{ url('/llms.txt') }}" type="text/plain" title="Site guide for AI agents">
    <link rel="sitemap" href="{{ url('/sitemap.xml') }}" type="application/xml">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet">

    <script>
        try {
            const savedMode = localStorage.getItem('darkMode');
            if (savedMode === 'true' || (savedMode === null && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        } catch (error) {}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('head')
</head>

<body class="bg-white font-sans text-slate-900 antialiased dark:bg-ink-950 dark:text-slate-100">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:text-primary-700 focus:shadow-lg">Skip to content</a>

    <div class="flex min-h-screen flex-col">
        <x-site.navbar />
        <main id="main-content" class="flex-1" tabindex="-1">
            {{ $slot }}
        </main>
        <x-site.footer />
    </div>

    <script type="application/json" id="site-data">{!! json_encode($agentData, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
