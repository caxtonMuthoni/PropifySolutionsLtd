@props(['techStack'])

<ul {{ $attributes->merge(['class' => 'grid grid-cols-2 border-l border-t border-slate-200 sm:grid-cols-3 lg:grid-cols-4 dark:border-white/10']) }}>
    @foreach ($techStack as $tech)
        @php
            $monogram = collect(preg_split('/\s+/', trim(preg_replace('/[^A-Za-z& ]/', ' ', $tech['name']))))
                ->filter()->take(2)->map(fn (string $word): string => strtoupper($word[0]))->implode('');
        @endphp
        <li class="flex flex-col items-center justify-center gap-3 border-b border-r border-slate-200 px-4 py-8 text-center dark:border-white/10">
            <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br {{ $tech['color'] }} text-lg font-bold text-white shadow-lg ring-1 ring-inset ring-white/30" aria-hidden="true">{{ $monogram }}</span>
            <span>
                <span class="block font-medium text-slate-900 dark:text-white">{{ $tech['name'] }}</span>
                <span class="block text-xs text-muted">{{ $tech['category'] }}</span>
            </span>
        </li>
    @endforeach
</ul>
