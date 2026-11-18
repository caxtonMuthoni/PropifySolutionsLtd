<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="Services" title="Software development services for growing African businesses" description="From a first MVP to enterprise platforms — we design, build, integrate and run the software your business depends on." :breadcrumbs="[['label' => 'Services']]">
        <x-slot:actions>
            <a href="{{ route('contact', ['type' => 'call']) }}" class="btn-primary">Discuss your project <x-icon name="arrow-right" class="h-4 w-4" /></a>
            <a href="{{ route('process') }}" class="btn-secondary">How we work</a>
        </x-slot:actions>
    </x-ui.page-hero>

    <section class="section pt-0" aria-label="All services">
        <ul class="container-page grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($services as $service)
                <li><x-sections.service-card :service="$service" /></li>
            @endforeach
        </ul>
    </section>

    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="industries-heading">
        <div class="container-page">
            <x-ui.section-heading id="industries-heading" eyebrow="Industries" title="Industries we serve" description="Deep experience where mobile money, regulation and low-bandwidth users meet." />
            <ul class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($industries as $industry)
                    <li>
                        <a href="{{ route('industries.show', $industry['slug']) }}" class="card flex h-full items-start gap-4 p-5 transition hover:border-primary-200 hover:shadow-glow dark:hover:border-primary-800">
                            <x-service-icon :name="$industry['icon']" class="h-6 w-6 shrink-0 text-primary-600 dark:text-primary-400" />
                            <span>
                                <span class="block font-semibold text-slate-950 dark:text-white">{{ $industry['title'] }}</span>
                                <span class="mt-1 block text-sm text-muted">{{ $industry['summary'] }}</span>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="section" aria-labelledby="process-heading">
        <div class="container-page">
            <x-ui.section-heading id="process-heading" eyebrow="How we work" title="Our delivery process" description="A predictable path from idea to launch, with working software every two weeks." />
            <x-sections.process-timeline :steps="$steps" class="mt-14" />
        </div>
    </section>

    <x-sections.cta-banner />
</x-layouts.app>
