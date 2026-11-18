@php
    $problems = [
        ['title' => 'Endless development', 'body' => 'Six-month build cycles that kill momentum.', 'consequence' => 'Lost market opportunity', 'icon' => 'hourglass', 'tag' => 'Month 7… still not live', 'background' => 'from-slate-700 to-ink-900'],
        ['title' => 'Technical debt trap', 'body' => 'Rushed code that makes every change slow and risky.', 'consequence' => 'Stuck with legacy code', 'icon' => 'unplug', 'tag' => '"Don\'t touch that file"', 'background' => 'from-amber-500 to-orange-700'],
        ['title' => 'Budget drain', 'body' => 'Unclear scope and overruns that eat your runway.', 'consequence' => 'Running out of resources', 'icon' => 'circle-dollar-sign', 'tag' => 'Invoice #14', 'background' => 'from-rose-500 to-red-700'],
    ];
@endphp

<div {{ $attributes->merge(['class' => 'grid gap-6 md:grid-cols-3']) }}>
    @foreach ($problems as $problem)
        <article class="flex flex-col">
            <h3 class="text-xl font-semibold text-slate-950 dark:text-white">{{ $problem['title'] }}</h3>
            <p class="mt-2 text-sm text-muted">{{ $problem['body'] }}</p>
            <p class="mt-1 flex items-center gap-1.5 text-sm font-semibold text-red-600 dark:text-red-400"><x-icon name="arrow-right" class="h-4 w-4" /> {{ $problem['consequence'] }}</p>
            <div class="relative mt-6 flex aspect-[4/3] items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-br {{ $problem['background'] }}" aria-hidden="true">
                <div class="absolute inset-0 bg-rings bg-cover bg-center"></div>
                <x-icon :name="$problem['icon']" class="relative h-20 w-20 text-white drop-shadow-xl" stroke-width="1.25" />
                <span class="absolute bottom-4 left-4 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-slate-800">{{ $problem['tag'] }}</span>
            </div>
        </article>
    @endforeach
</div>
