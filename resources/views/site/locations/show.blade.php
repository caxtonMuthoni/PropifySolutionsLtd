<x-layouts.app :seo="$seo">
    <x-ui.page-hero :eyebrow="$location['is_headquarters'] ? 'Headquarters · '.$location['city'] : $location['city'].', '.$location['country']" :title="$location['headline']" :description="$location['intro']" :breadcrumbs="[['label' => 'Locations', 'href' => route('locations')], ['label' => $location['city'].', '.$location['country']]]">
        <x-slot:actions>
            <a href="{{ route('contact', ['type' => 'call']) }}" class="btn-primary">Book a free consultation <x-icon name="arrow-right" class="h-4 w-4" /></a>
            <a href="{{ $site['contact']['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="btn-secondary">WhatsApp us</a>
        </x-slot:actions>
        <dl class="mt-10 grid max-w-3xl gap-4 sm:grid-cols-3">
            <div class="card p-4"><dt class="text-xs text-muted">Time zone</dt><dd class="mt-1 font-semibold text-slate-950 dark:text-white">{{ $location['timezone'] }}</dd></div>
            <div class="card p-4"><dt class="text-xs text-muted">Delivery</dt><dd class="mt-1 font-semibold text-slate-950 dark:text-white">{{ $location['is_headquarters'] ? 'On-site & remote' : 'Remote + on-site workshops' }}</dd></div>
            <div class="card p-4"><dt class="text-xs text-muted">Cities served</dt><dd class="mt-1 font-semibold text-slate-950 dark:text-white">{{ implode(', ', array_slice($location['cities'], 0, 3)) }}</dd></div>
        </dl>
    </x-ui.page-hero>

    <section class="section pt-0" aria-labelledby="local-services-heading">
        <div class="container-page">
            <x-ui.section-heading id="local-services-heading" :title="'Our services in '.$location['city']" :description="'Everything you need to launch and scale digital products in '.$location['country'].'.'" />
            <ul class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($services as $service)
                    <li><x-sections.service-card :service="$service" /></li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="local-heading">
        <div class="container-page grid gap-6 lg:grid-cols-3">
            <div class="card p-8">
                <x-icon name="wallet" class="h-7 w-7 text-primary-600 dark:text-primary-400" />
                <h2 id="local-heading" class="mt-4 text-xl font-semibold text-slate-950 dark:text-white">Payments in {{ $location['country'] }}</h2>
                <ul class="mt-4 flex flex-col gap-2 text-sm">
                    @foreach ($location['payments'] as $payment)
                        <li class="flex items-start gap-2"><x-icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-emerald-500" />{{ $payment }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card p-8">
                <x-icon name="shield-check" class="h-7 w-7 text-primary-600 dark:text-primary-400" />
                <h2 class="mt-4 text-xl font-semibold text-slate-950 dark:text-white">Local compliance</h2>
                <ul class="mt-4 flex flex-col gap-4 text-sm">
                    @foreach ($location['compliance'] as $item)
                        <li><span class="block font-semibold text-slate-900 dark:text-white">{{ $item['title'] }}</span><span class="text-muted">{{ $item['body'] }}</span></li>
                    @endforeach
                </ul>
            </div>
            <div class="card p-8">
                <x-icon name="building-2" class="h-7 w-7 text-primary-600 dark:text-primary-400" />
                <h2 class="mt-4 text-xl font-semibold text-slate-950 dark:text-white">Industries &amp; cities</h2>
                <ul class="mt-4 flex flex-wrap gap-2">
                    @foreach ($location['industries'] as $industry)
                        <li class="rounded-full bg-primary-50 px-3 py-1 text-xs font-medium text-primary-700 dark:bg-primary-950 dark:text-primary-300">{{ $industry }}</li>
                    @endforeach
                </ul>
                <p class="mt-5 text-sm text-muted">Serving clients in {{ implode(', ', $location['cities']) }}.</p>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="location-work-heading">
        <div class="container-page">
            <h2 id="location-work-heading" class="text-2xl font-semibold text-slate-950 dark:text-white">Recent projects</h2>
            <ul class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($caseStudies as $caseStudy)
                    <li><x-sections.case-study-card :case-study="$caseStudy" /></li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="section pt-0" aria-labelledby="location-faq-heading">
        <div class="container-page max-w-4xl">
            <x-ui.section-heading id="location-faq-heading" :title="$location['country'].' FAQs'" />
            <x-sections.faq-accordion :faqs="$location['faqs']" class="mt-10" />
            <p class="mt-10 text-center text-sm text-muted">
                Also serving:
                @foreach ($otherLocations as $other)
                    <a href="{{ route('locations.show', $other['slug']) }}" class="font-medium text-primary-600 hover:underline dark:text-primary-400">{{ $other['city'] }}, {{ $other['country'] }}</a>@unless ($loop->last) · @endunless
                @endforeach
            </p>
        </div>
    </section>

    <x-sections.cta-banner :title="'Building in '.$location['country'].'?'" />
</x-layouts.app>
