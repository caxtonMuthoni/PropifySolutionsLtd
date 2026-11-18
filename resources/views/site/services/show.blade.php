<x-layouts.app :seo="$seo">
    <x-ui.page-hero :eyebrow="$service['short_title']" :title="$service['title']" :description="$service['description']" :breadcrumbs="[['label' => 'Services', 'href' => route('services')], ['label' => $service['short_title']]]">
        <x-slot:actions>
            <a href="{{ route('contact', ['service' => $service['slug']]) }}" class="btn-primary">Get a quote <x-icon name="arrow-right" class="h-4 w-4" /></a>
            <a href="{{ route('contact', ['type' => 'call']) }}" class="btn-secondary">Book a free call</a>
        </x-slot:actions>
    </x-ui.page-hero>

    <section class="section pt-0" aria-labelledby="outcomes-heading">
        <div class="container-page">
            <h2 id="outcomes-heading" class="sr-only">Outcomes</h2>
            <ul class="grid gap-5 md:grid-cols-3">
                @foreach ($service['outcomes'] as $outcome)
                    <li class="card p-6">
                        <x-icon name="badge-check" class="h-6 w-6 text-primary-600 dark:text-primary-400" />
                        <h3 class="mt-4 text-lg font-semibold text-slate-950 dark:text-white">{{ $outcome['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-muted">{{ $outcome['body'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="deliverables-heading">
        <div class="container-page grid gap-12 lg:grid-cols-2">
            <div>
                <x-ui.section-heading id="deliverables-heading" align="left" eyebrow="What you get" title="Deliverables" :description="$service['summary']" />
                <ul class="mt-8 flex flex-col gap-3">
                    @foreach ($service['deliverables'] as $item)
                        <li class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-4 dark:border-white/10 dark:bg-ink-900">
                            <x-icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-emerald-500" />
                            <span class="text-slate-800 dark:text-slate-200">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-slate-950 dark:text-white">Technology we use</h2>
                <ul class="mt-6 flex flex-wrap gap-2">
                    @foreach ($service['stack'] as $tech)
                        <li class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium dark:border-white/10 dark:bg-ink-900">{{ $tech }}</li>
                    @endforeach
                </ul>
                <div class="card mt-10 p-6">
                    <h3 class="text-lg font-semibold text-slate-950 dark:text-white">Available across Africa</h3>
                    <p class="mt-2 text-sm text-muted">We deliver {{ strtolower($service['short_title']) }} for clients in:</p>
                    <ul class="mt-4 flex flex-wrap gap-2">
                        @foreach ($site['locations'] as $location)
                            <li><a href="{{ route('locations.show', $location['slug']) }}" class="inline-flex rounded-full bg-primary-50 px-3 py-1 text-sm font-medium text-primary-700 hover:bg-primary-100 dark:bg-primary-950 dark:text-primary-300">{{ $location['city'] }}, {{ $location['country'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @if ($caseStudies)
        <section class="section" aria-labelledby="related-work-heading">
            <div class="container-page">
                <x-ui.section-heading id="related-work-heading" title="Related work" />
                <ul class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($caseStudies as $caseStudy)
                        <li><x-sections.case-study-card :case-study="$caseStudy" /></li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    @if ($service['faqs'])
        <section class="section pt-0" aria-labelledby="service-faq-heading">
            <div class="container-page max-w-4xl">
                <x-ui.section-heading id="service-faq-heading" :title="'Questions about '.strtolower($service['short_title'])" />
                <x-sections.faq-accordion :faqs="$service['faqs']" class="mt-10" />
            </div>
        </section>
    @endif

    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="other-services-heading">
        <div class="container-page">
            <h2 id="other-services-heading" class="text-2xl font-semibold text-slate-950 dark:text-white">Other services</h2>
            <ul class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach (array_slice($otherServices, 0, 4) as $other)
                    <li><x-sections.service-card :service="$other" /></li>
                @endforeach
            </ul>
        </div>
    </section>

    <x-sections.cta-banner :title="'Let\'s build your '.strtolower($service['short_title']).' project'" />
</x-layouts.app>
