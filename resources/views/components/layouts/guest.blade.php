@props(['title' => null])

<x-layouts.app :title="$title">
    <section class="relative overflow-hidden pb-24 pt-32">
        <div class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-b from-primary-50 to-white dark:from-primary-950/40 dark:to-ink-950" aria-hidden="true"></div>
        <div class="container-page flex justify-center">
            <div class="card w-full max-w-md p-8">
                <x-logo-mark class="mx-auto h-12 w-12" />
                @if ($title)
                    <h1 class="mt-6 text-center text-2xl font-semibold text-slate-950 dark:text-white">{{ $title }}</h1>
                @endif
                <div class="mt-8">{{ $slot }}</div>
            </div>
        </div>
    </section>
</x-layouts.app>
