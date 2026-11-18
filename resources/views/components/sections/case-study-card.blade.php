@props(['caseStudy'])

<article class="group card overflow-hidden transition duration-300 hover:-translate-y-1 hover:shadow-glow">
    <a href="{{ route('portfolio.show', $caseStudy['slug']) }}" class="block">
        <div class="relative aspect-[16/10] overflow-hidden bg-gradient-to-br from-primary-100 to-sky-50 dark:from-primary-950 dark:to-ink-900">
            <img src="{{ $caseStudy['image'] }}" alt="{{ $caseStudy['name'] }} – {{ $caseStudy['category'] }} screenshot" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-[1.03]" loading="lazy" decoding="async" width="1280" height="800">
            <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-slate-900 backdrop-blur dark:bg-ink-950/80 dark:text-white">{{ $caseStudy['category'] }}</span>
        </div>
        <div class="p-6">
            <p class="text-xs font-semibold uppercase tracking-wider text-primary-600 dark:text-primary-400">{{ $caseStudy['industry'] }} · {{ $caseStudy['market'] }}</p>
            <h3 class="mt-2 text-lg font-semibold text-slate-950 dark:text-white">{{ $caseStudy['title'] }}</h3>
            <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-muted">{{ $caseStudy['summary'] }}</p>
            <ul class="mt-4 flex flex-wrap gap-1.5" aria-label="Technology used">
                @foreach ($caseStudy['stack'] as $tech)
                    <li class="rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600 dark:bg-white/5 dark:text-slate-300">{{ $tech }}</li>
                @endforeach
            </ul>
        </div>
    </a>
</article>
