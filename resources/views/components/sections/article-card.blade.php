@props(['article'])

<article class="group card relative flex h-full flex-col p-6 transition hover:-translate-y-1 hover:shadow-glow">
    <p class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-primary-600 dark:text-primary-400">
        {{ $article['category'] }} <span class="text-slate-300" aria-hidden="true">•</span>
        <span class="text-muted">{{ $article['reading_minutes'] }} min read</span>
    </p>
    <h3 class="mt-3 text-lg font-semibold text-slate-950 dark:text-white">
        <a href="{{ route('insights.show', $article['slug']) }}" class="after:absolute after:inset-0">{{ $article['title'] }}</a>
    </h3>
    <p class="mt-3 flex-1 text-sm leading-relaxed text-muted">{{ $article['excerpt'] }}</p>
    <time datetime="{{ $article['published_at'] }}" class="mt-6 text-xs text-muted">{{ \Illuminate\Support\Carbon::parse($article['published_at'])->format('j F Y') }}</time>
</article>
