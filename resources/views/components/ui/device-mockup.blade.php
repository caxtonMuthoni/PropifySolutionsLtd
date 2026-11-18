@props(['src', 'alt', 'variant' => 'laptop', 'eager' => false])

<figure {{ $attributes->merge(['class' => 'relative']) }}>
    @if ($variant === 'browser')
        <div class="mx-auto w-full overflow-hidden rounded-2xl border border-white/40 bg-white shadow-2xl dark:border-white/10 dark:bg-ink-800">
            <div class="flex items-center gap-1.5 border-b border-slate-200 px-4 py-3 dark:border-white/10" aria-hidden="true">
                <span class="h-2.5 w-2.5 rounded-full bg-red-400"></span>
                <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
                <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
            </div>
            <div class="aspect-[4/3] overflow-hidden bg-slate-100">
                <img src="{{ $src }}" alt="{{ $alt }}" class="h-full w-full object-cover object-left-top" loading="{{ $eager ? 'eager' : 'lazy' }}" decoding="async" width="1280" height="960">
            </div>
        </div>
    @else
        <div class="mx-auto w-full">
            <div class="rounded-t-2xl border-[10px] border-b-0 border-ink-900 bg-ink-900 shadow-2xl dark:border-ink-700 dark:bg-ink-700">
                <div class="aspect-[16/10] overflow-hidden rounded-t-md bg-slate-100">
                    <img src="{{ $src }}" alt="{{ $alt }}" class="h-full w-full object-cover object-left-top" loading="{{ $eager ? 'eager' : 'lazy' }}" @if ($eager) fetchpriority="high" @endif decoding="async" width="1280" height="800">
                </div>
            </div>
            <div class="relative mx-[-6%] h-4 rounded-b-2xl bg-gradient-to-b from-slate-300 to-slate-400 dark:from-ink-700 dark:to-ink-800">
                <div class="absolute left-1/2 top-0 h-1.5 w-20 -translate-x-1/2 rounded-b-lg bg-slate-400/80 dark:bg-ink-900"></div>
            </div>
        </div>
    @endif
</figure>
