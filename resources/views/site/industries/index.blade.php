<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="Industries" title="Software for the industries that move Africa" description="We combine sector knowledge with modern engineering to build tools that fit how your industry really works." :breadcrumbs="[['label' => 'Industries']]" />
    <section class="section pt-0" aria-label="Industries">
        <ul class="container-page grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($industries as $industry)
                <li>
                    <a href="{{ route('industries.show', $industry['slug']) }}" class="group card flex h-full flex-col p-6 transition hover:-translate-y-1 hover:shadow-glow">
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary-600 dark:bg-primary-950 dark:text-primary-300"><x-service-icon :name="$industry['icon']" class="h-6 w-6" /></span>
                        <h2 class="mt-5 text-lg font-semibold text-slate-950 dark:text-white">{{ $industry['title'] }}</h2>
                        <p class="mt-2 flex-1 text-sm text-muted">{{ $industry['summary'] }}</p>
                        <span class="mt-5 inline-flex items-center gap-1 text-sm font-semibold text-primary-600 dark:text-primary-400">Explore <x-icon name="arrow-up-right" class="h-4 w-4" /></span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
    <x-sections.cta-banner />
</x-layouts.app>
