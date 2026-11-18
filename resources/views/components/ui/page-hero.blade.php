@props(['eyebrow' => null, 'title' => null, 'description' => null, 'breadcrumbs' => [], 'centered' => false])

<section class="relative overflow-hidden pb-14 pt-28 sm:pb-20 sm:pt-36">
    <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
        <div class="absolute inset-0 bg-gradient-to-b from-primary-50/80 via-white to-white dark:from-primary-950/40 dark:via-ink-950 dark:to-ink-950"></div>
        <div class="absolute inset-0 hidden bg-topo-light bg-cover bg-left lg:block [mask-image:linear-gradient(to_left,black,transparent_45%)] dark:bg-topo-dark"></div>
        <div class="absolute -top-40 left-1/2 h-[28rem] w-[56rem] -translate-x-1/2 rounded-full bg-primary-400/20 blur-3xl dark:bg-primary-600/20"></div>
    </div>
    <div class="container-page">
        @if ($breadcrumbs)
            <x-ui.breadcrumbs :items="$breadcrumbs" class="mb-8" />
        @endif
        <div @class(['mx-auto max-w-3xl text-center' => $centered, 'max-w-3xl' => ! $centered])>
            @if ($eyebrow)
                <p class="eyebrow">{{ $eyebrow }}</p>
            @endif
            <h1 class="mt-5 text-4xl font-semibold text-slate-950 sm:text-5xl lg:text-6xl dark:text-white">{{ $title }}</h1>
            @if ($description)
                <p class="mt-6 text-lg leading-relaxed text-muted">{{ $description }}</p>
            @endif
            @isset($actions)
                <div @class(['mt-8 flex flex-wrap gap-3', 'justify-center' => $centered])>{{ $actions }}</div>
            @endisset
        </div>
        {{ $slot }}
    </div>
</section>
