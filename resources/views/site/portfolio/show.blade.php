@php
    $facts = [
        ['label' => 'Industry', 'value' => $caseStudy['industry']],
        ['label' => 'Market', 'value' => $caseStudy['market']],
        ['label' => 'Platform', 'value' => $caseStudy['platform']],
        ['label' => 'Type', 'value' => $caseStudy['category']],
    ];
@endphp

<x-layouts.app :seo="$seo">
    <x-ui.page-hero :eyebrow="$caseStudy['industry'].' · '.$caseStudy['market']" :title="$caseStudy['title']" :description="$caseStudy['summary']" :breadcrumbs="[['label' => 'Portfolio', 'href' => route('portfolio')], ['label' => $caseStudy['name']]]">
        <dl class="mt-10 grid max-w-3xl grid-cols-2 gap-4 sm:grid-cols-4">
            @foreach ($facts as $fact)
                <div class="card p-4">
                    <dt class="text-xs text-muted">{{ $fact['label'] }}</dt>
                    <dd class="mt-1 font-semibold text-slate-950 dark:text-white">{{ $fact['value'] }}</dd>
                </div>
            @endforeach
        </dl>
    </x-ui.page-hero>

    <section class="pb-20" aria-label="Product screenshot">
        <div class="container-page">
            <div class="rounded-3xl bg-gradient-to-br from-slate-100 to-primary-100 px-6 pt-10 sm:px-16 sm:pt-16 dark:from-ink-800 dark:to-primary-950">
                <x-ui.device-mockup :src="$caseStudy['image']" :alt="$caseStudy['name'].' – '.$caseStudy['category'].' screenshot'" :eager="true" />
            </div>
        </div>
    </section>

    <section class="section pt-0">
        <div class="container-page grid gap-12 lg:grid-cols-3">
            <article class="flex flex-col gap-10 lg:col-span-2">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-950 dark:text-white">The challenge</h2>
                    <p class="mt-4 text-lg leading-relaxed text-muted">{{ $caseStudy['challenge'] }}</p>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-slate-950 dark:text-white">Our solution</h2>
                    <p class="mt-4 text-lg leading-relaxed text-muted">{{ $caseStudy['solution'] }}</p>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-slate-950 dark:text-white">Key features</h2>
                    <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                        @foreach ($caseStudy['features'] as $feature)
                            <li class="flex items-start gap-3 rounded-xl border border-slate-200 p-4 dark:border-white/10"><x-icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-emerald-500" />{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </article>
            <aside class="flex flex-col gap-6">
                <div class="card p-6">
                    <h2 class="font-semibold text-slate-950 dark:text-white">Technology</h2>
                    <ul class="mt-4 flex flex-wrap gap-2">
                        @foreach ($caseStudy['stack'] as $tech)
                            <li class="rounded-lg bg-slate-100 px-3 py-1.5 text-sm dark:bg-white/5">{{ $tech }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card p-6">
                    <h2 class="font-semibold text-slate-950 dark:text-white">Services provided</h2>
                    <ul class="mt-4 flex flex-col gap-2">
                        @foreach ($services as $service)
                            <li><a href="{{ route('services.show', $service['slug']) }}" class="flex items-center justify-between rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-50 dark:hover:bg-white/5">{{ $service['short_title'] }} <x-icon name="arrow-up-right" class="h-4 w-4 text-primary-600" /></a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </section>

    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="more-work-heading">
        <div class="container-page">
            <h2 id="more-work-heading" class="text-2xl font-semibold text-slate-950 dark:text-white">More case studies</h2>
            <ul class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($moreCaseStudies as $other)
                    <li><x-sections.case-study-card :case-study="$other" /></li>
                @endforeach
            </ul>
        </div>
    </section>

    <x-sections.cta-banner title="Want results like these?" />
</x-layouts.app>
