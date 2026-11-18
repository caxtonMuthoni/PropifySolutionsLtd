<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="Industry" :title="$industry['title'].' software development'" :description="$industry['description']" :breadcrumbs="[['label' => 'Industries', 'href' => route('industries')], ['label' => $industry['title']]]">
        <x-slot:actions>
            <a href="{{ route('contact', ['type' => 'call']) }}" class="btn-primary">Talk to an expert <x-icon name="arrow-right" class="h-4 w-4" /></a>
        </x-slot:actions>
    </x-ui.page-hero>

    <section class="section pt-0" aria-labelledby="solutions-heading">
        <div class="container-page grid gap-12 lg:grid-cols-2">
            <div>
                <h2 id="solutions-heading" class="text-3xl font-semibold text-slate-950 dark:text-white">Solutions we build</h2>
                <ul class="mt-8 flex flex-col gap-3">
                    @foreach ($industry['solutions'] as $solution)
                        <li class="flex items-start gap-3 rounded-xl border border-slate-200 p-4 dark:border-white/10"><x-icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-emerald-500" />{{ $solution }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2 class="text-3xl font-semibold text-slate-950 dark:text-white">Relevant services</h2>
                <ul class="mt-8 grid gap-4">
                    @foreach ($services as $service)
                        <li><x-sections.service-card :service="$service" /></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    @if ($caseStudies)
        <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="industry-work-heading">
            <div class="container-page">
                <h2 id="industry-work-heading" class="text-2xl font-semibold text-slate-950 dark:text-white">{{ $industry['title'] }} projects</h2>
                <ul class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($caseStudies as $caseStudy)
                        <li><x-sections.case-study-card :case-study="$caseStudy" /></li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    <section class="section" aria-labelledby="other-industries-heading">
        <div class="container-page">
            <h2 id="other-industries-heading" class="text-2xl font-semibold text-slate-950 dark:text-white">Other industries</h2>
            <ul class="mt-6 flex flex-wrap gap-2">
                @foreach ($otherIndustries as $other)
                    <li><a href="{{ route('industries.show', $other['slug']) }}" class="btn-secondary !py-2">{{ $other['title'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </section>

    <x-sections.cta-banner />
</x-layouts.app>
