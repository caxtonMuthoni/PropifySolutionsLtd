@php
    $navigation = [
        ['name' => 'Work', 'route' => 'portfolio'],
        ['name' => 'Industries', 'route' => 'industries'],
        ['name' => 'Process', 'route' => 'process'],
        ['name' => 'Insights', 'route' => 'insights'],
    ];
    $mobileNavigation = [
        ['name' => 'Home', 'route' => 'home'],
        ['name' => 'About', 'route' => 'about'],
        ...$navigation,
        ['name' => 'Locations', 'route' => 'locations'],
        ['name' => 'FAQ', 'route' => 'faq'],
        ['name' => 'Careers', 'route' => 'careers'],
        ['name' => 'Contact', 'route' => 'contact'],
    ];
    $isActive = fn (string $name): bool => request()->routeIs($name, "{$name}.*");
@endphp

<header
    x-data="{ scrolled: false, open: false, services: false }"
    x-init="scrolled = window.scrollY > 12"
    x-on:scroll.window.passive="scrolled = window.scrollY > 12"
    x-on:keydown.escape.window="open = false; services = false"
    class="fixed inset-x-0 top-0 z-50 transition-all duration-300"
    x-bind:class="scrolled || open ? 'border-b border-slate-200/70 bg-white/85 backdrop-blur-xl dark:border-white/10 dark:bg-ink-950/85' : 'bg-transparent'"
>
    <nav class="container-page flex h-16 items-center justify-between gap-4 lg:h-20" aria-label="Main navigation">
        <x-logo />

        <ul class="hidden items-center gap-1 rounded-full border border-slate-200/80 bg-white/70 p-1 shadow-soft backdrop-blur lg:flex dark:border-white/10 dark:bg-white/5">
            <li>
                <a
                    href="{{ route('about') }}"
                    @class([
                        'block rounded-full px-4 py-2 text-sm font-medium transition',
                        'bg-ink-900 text-white dark:bg-white dark:text-ink-900' => $isActive('about'),
                        'text-slate-700 hover:text-slate-950 dark:text-slate-300 dark:hover:text-white' => ! $isActive('about'),
                    ])
                    @if ($isActive('about')) aria-current="page" @endif
                >About</a>
            </li>
            <li class="relative" x-on:mouseenter="services = true" x-on:mouseleave="services = false">
                <button
                    type="button"
                    @class([
                        'inline-flex items-center gap-1 rounded-full px-4 py-2 text-sm font-medium transition',
                        'bg-ink-900 text-white dark:bg-white dark:text-ink-900' => $isActive('services'),
                        'text-slate-700 hover:text-slate-950 dark:text-slate-300 dark:hover:text-white' => ! $isActive('services'),
                    ])
                    x-on:click="services = ! services"
                    x-bind:aria-expanded="services"
                    aria-expanded="false"
                    aria-controls="services-menu"
                >
                    Services
                    <x-icon name="chevron-down" class="h-4 w-4 transition" x-bind:class="services && 'rotate-180'" />
                </button>
                <div id="services-menu" x-cloak x-show="services" x-transition.opacity class="absolute left-1/2 top-full w-[40rem] -translate-x-1/2 pt-3">
                    <div class="card grid grid-cols-2 gap-1 p-3">
                        @foreach ($site['services'] as $service)
                            <a href="{{ route('services.show', $service['slug']) }}" class="flex gap-3 rounded-xl p-3 transition hover:bg-slate-50 dark:hover:bg-white/5">
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary-600 dark:bg-primary-950 dark:text-primary-300">
                                    <x-service-icon :name="$service['icon']" class="h-4 w-4" />
                                </span>
                                <span>
                                    <span class="block text-sm font-semibold text-slate-900 dark:text-white">{{ $service['title'] }}</span>
                                    <span class="mt-0.5 block text-xs leading-snug text-muted">{{ $service['summary'] }}</span>
                                </span>
                            </a>
                        @endforeach
                        <a href="{{ route('services') }}" class="col-span-2 mt-1 flex items-center justify-between rounded-xl bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-100 dark:bg-white/5 dark:text-white dark:hover:bg-white/10">
                            View all services <x-icon name="arrow-right" class="h-4 w-4" />
                        </a>
                    </div>
                </div>
            </li>
            @foreach ($navigation as $item)
                <li>
                    <a
                        href="{{ route($item['route']) }}"
                        @class([
                            'block rounded-full px-4 py-2 text-sm font-medium transition',
                            'bg-ink-900 text-white dark:bg-white dark:text-ink-900' => $isActive($item['route']),
                            'text-slate-700 hover:text-slate-950 dark:text-slate-300 dark:hover:text-white' => ! $isActive($item['route']),
                        ])
                        @if ($isActive($item['route'])) aria-current="page" @endif
                    >{{ $item['name'] }}</a>
                </li>
            @endforeach
        </ul>

        <div class="flex items-center gap-2">
            <x-theme-toggle />
            <a href="{{ route('contact', ['type' => 'call']) }}" class="btn-primary hidden !py-2.5 sm:inline-flex">Book a Call</a>
            <button
                type="button"
                class="flex h-10 w-10 items-center justify-center rounded-xl text-slate-700 transition hover:bg-slate-100 lg:hidden dark:text-slate-200 dark:hover:bg-white/10"
                x-on:click="open = ! open"
                x-bind:aria-expanded="open"
                aria-expanded="false"
                aria-controls="mobile-menu"
                aria-label="Toggle menu"
            >
                <x-icon name="x" class="h-6 w-6" x-show="open" x-cloak />
                <x-icon name="menu" class="h-6 w-6" x-show="! open" />
            </button>
        </div>
    </nav>

    <div id="mobile-menu" x-cloak x-show="open" x-transition.opacity class="max-h-[calc(100dvh-4rem)] overflow-y-auto border-t border-slate-200/70 bg-white lg:hidden dark:border-white/10 dark:bg-ink-950">
        <div class="container-page flex flex-col gap-6 py-6">
            <ul class="flex flex-col gap-1">
                @foreach ($mobileNavigation as $item)
                    <li>
                        <a
                            href="{{ route($item['route']) }}"
                            @class([
                                'block rounded-xl px-3 py-2.5 text-base font-medium',
                                'bg-primary-50 text-primary-700 dark:bg-primary-950 dark:text-primary-300' => $isActive($item['route']),
                                'text-slate-800 hover:bg-slate-50 dark:text-slate-200 dark:hover:bg-white/5' => ! $isActive($item['route']),
                            ])
                            @if ($isActive($item['route'])) aria-current="page" @endif
                        >{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="border-t border-slate-200/70 pt-4 dark:border-white/10">
                <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-slate-500">Services</p>
                <ul class="grid grid-cols-1 gap-1 sm:grid-cols-2">
                    @foreach ($site['services'] as $service)
                        <li>
                            <a href="{{ route('services.show', $service['slug']) }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-800 hover:bg-slate-50 dark:text-slate-200 dark:hover:bg-white/5">
                                <x-service-icon :name="$service['icon']" class="h-4 w-4 text-primary-600 dark:text-primary-400" />
                                {{ $service['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <a href="{{ route('contact', ['type' => 'call']) }}" class="btn-primary w-full">Book a free consultation</a>
        </div>
    </div>
</header>
