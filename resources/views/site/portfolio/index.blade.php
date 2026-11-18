@php($categories = collect($caseStudies)->pluck('platform')->unique()->values()->prepend('All')->all())

<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="Our work" title="Software that ships — and keeps working" description="Marketplaces, SaaS products, AI tools and operations systems built for clients in Kenya and around the world." :breadcrumbs="[['label' => 'Portfolio']]" />

    <section class="section pt-0" aria-label="Case studies" x-data="{ category: 'All' }">
        <div class="container-page">
            <div class="flex flex-wrap gap-2" role="group" aria-label="Filter by platform">
                @foreach ($categories as $category)
                    <button
                        type="button"
                        class="rounded-full border px-4 py-2 text-sm font-medium transition"
                        x-on:click="category = @js($category)"
                        x-bind:aria-pressed="category === @js($category)"
                        x-bind:class="category === @js($category) ? 'border-ink-900 bg-ink-900 text-white dark:border-white dark:bg-white dark:text-ink-900' : 'border-slate-200 text-slate-700 hover:border-slate-300 dark:border-white/10 dark:text-slate-300'"
                    >{{ $category }}</button>
                @endforeach
            </div>
            <ul class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($caseStudies as $caseStudy)
                    <li x-show="category === 'All' || category === @js($caseStudy['platform'])"><x-sections.case-study-card :case-study="$caseStudy" /></li>
                @endforeach
            </ul>
        </div>
    </section>

    <x-sections.cta-banner title="Your project could be next" />
</x-layouts.app>
