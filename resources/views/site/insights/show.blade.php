<x-layouts.app :seo="$seo">
    <article>
        <x-ui.page-hero :eyebrow="$article['category']" :title="$article['title']" :description="$article['excerpt']" :breadcrumbs="[['label' => 'Insights', 'href' => route('insights')], ['label' => $article['category']]]">
            <p class="mt-6 flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-muted">
                <span>By the Propify Solutions team</span>
                <time datetime="{{ $article['published_at'] }}">{{ \Illuminate\Support\Carbon::parse($article['published_at'])->format('j F Y') }}</time>
                <span>{{ $article['reading_minutes'] }} min read</span>
            </p>
        </x-ui.page-hero>
        <div class="container-page pb-20">
            <div class="prose-article mx-auto max-w-3xl overflow-x-auto">{!! $article['html'] !!}</div>
            <aside class="mx-auto mt-12 max-w-3xl rounded-2xl bg-gradient-to-br from-primary-600 to-primary-800 p-8 text-white">
                <h2 class="text-2xl font-semibold">Planning a project?</h2>
                <p class="mt-2 text-primary-100">Book a free 30-minute call with an engineer — we'll help you scope it properly.</p>
                <a href="{{ route('contact', ['type' => 'call']) }}" class="btn mt-6 bg-white text-primary-700 hover:bg-primary-50">Book a call <x-icon name="arrow-right" class="h-4 w-4" /></a>
            </aside>
        </div>
    </article>

    @if ($moreArticles)
        <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="more-articles-heading">
            <div class="container-page">
                <h2 id="more-articles-heading" class="text-2xl font-semibold text-slate-950 dark:text-white">Keep reading</h2>
                <ul class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($moreArticles as $other)
                        <li><x-sections.article-card :article="$other" /></li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif
</x-layouts.app>
