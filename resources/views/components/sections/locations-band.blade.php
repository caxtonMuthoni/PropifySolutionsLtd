@props(['locations'])

@php($flags = ['KE' => '🇰🇪', 'UG' => '🇺🇬', 'TZ' => '🇹🇿', 'NG' => '🇳🇬', 'GH' => '🇬🇭'])

<ul {{ $attributes->merge(['class' => 'grid gap-4 sm:grid-cols-2 lg:grid-cols-5']) }}>
    @foreach ($locations as $location)
        <li>
            <a href="{{ route('locations.show', $location['slug']) }}" class="group card flex h-full flex-col p-5 transition hover:-translate-y-1 hover:border-primary-200 hover:shadow-glow dark:hover:border-primary-800">
                <span class="flex items-center justify-between">
                    <span class="text-3xl" aria-hidden="true">{{ $flags[$location['country_code']] ?? '' }}</span>
                    @if ($location['is_headquarters'])
                        <span class="rounded-full bg-primary-50 px-2 py-0.5 text-[0.65rem] font-semibold uppercase tracking-wider text-primary-700 dark:bg-primary-950 dark:text-primary-300">HQ</span>
                    @endif
                </span>
                <span class="mt-4 block text-lg font-semibold text-slate-950 dark:text-white">{{ $location['city'] }}</span>
                <span class="block text-sm text-muted">{{ $location['country'] }} · {{ $location['timezone'] }}</span>
                <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-primary-600 dark:text-primary-400">Explore <x-icon name="arrow-up-right" class="h-4 w-4 transition group-hover:translate-x-0.5" /></span>
            </a>
        </li>
    @endforeach
</ul>
