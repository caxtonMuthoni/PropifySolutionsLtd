@php
    $partners = [
        ['name' => 'M-Pesa', 'logo' => '/images/companies/mpesa.png'],
        ['name' => 'DigitalOcean', 'logo' => '/images/companies/do.png'],
        ['name' => "Africa's Talking", 'logo' => '/images/companies/aft.png'],
        ['name' => 'HostAfrica', 'logo' => '/images/companies/hostafrica.svg'],
        ['name' => 'Mailjet', 'logo' => '/images/companies/mailjet.png'],
    ];
    $yearsExperience = now()->year - config('agency.founded');
@endphp

<x-layouts.app :seo="$seo">
    {{-- Hero --}}
    <section class="relative overflow-hidden pt-28 sm:pt-36" aria-labelledby="hero-heading">
        <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
            <div class="absolute inset-0 bg-gradient-to-b from-primary-50 via-white to-white dark:from-primary-950/50 dark:via-ink-950 dark:to-ink-950"></div>
            <div class="absolute inset-0 hidden bg-topo-light bg-cover bg-center lg:block [mask-image:linear-gradient(to_right,black,transparent_22%,transparent_78%,black)] dark:bg-topo-dark"></div>
            <div class="absolute -top-32 left-1/2 h-[30rem] w-[60rem] -translate-x-1/2 rounded-full bg-primary-400/25 blur-3xl dark:bg-primary-600/20"></div>
        </div>
        <div class="container-page text-center">
            <p class="eyebrow animate-slide-up">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500" aria-hidden="true"></span>
                Software development company · Nairobi, Kenya
            </p>
            <h1 id="hero-heading" class="mx-auto mt-6 max-w-4xl animate-slide-up text-4xl font-semibold text-slate-950 [animation-delay:80ms] sm:text-6xl lg:text-7xl dark:text-white">
                Build and launch your product in
                <span class="bg-gradient-to-r from-primary-600 to-accent-500 bg-clip-text text-transparent">weeks, not months</span>
            </h1>
            <p class="mx-auto mt-6 max-w-2xl animate-slide-up text-lg leading-relaxed text-muted [animation-delay:160ms]">
                Propify Solutions builds custom web apps, mobile apps, SaaS platforms and AI automation for ambitious businesses in
                Kenya, Uganda, Tanzania, Nigeria and Ghana — with M-Pesa and mobile money built in.
            </p>
            <div class="mt-9 flex animate-slide-up flex-wrap justify-center gap-3 [animation-delay:240ms]">
                <a href="{{ route('contact', ['type' => 'call']) }}" class="btn-primary !px-6">Schedule a strategy call <x-icon name="arrow-right" class="h-4 w-4" /></a>
                <a href="{{ route('portfolio') }}" class="btn-secondary !px-6">View our work</a>
            </div>

            <dl class="mx-auto mt-14 grid max-w-4xl grid-cols-2 gap-y-8 sm:grid-cols-4">
                @foreach ($stats as $stat)
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-sm text-muted">{{ $stat['label'] }}</dt>
                        <dd class="text-4xl font-semibold tabular-nums text-slate-950 dark:text-white">{{ $stat['value'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>

        <div class="container-page mt-16 grid gap-4 lg:grid-cols-5">
            <div class="relative flex items-end overflow-hidden rounded-3xl bg-gradient-to-br from-slate-100 to-primary-100 px-6 pt-10 sm:px-12 lg:col-span-3 dark:from-ink-800 dark:to-primary-950">
                <x-ui.device-mockup src="/images/projects/propify.png" alt="Propify real estate marketplace built by Propify Solutions" class="w-full translate-y-6" :eager="true" />
            </div>
            <div class="relative flex items-end justify-center overflow-hidden rounded-3xl bg-gradient-to-br from-primary-500 to-primary-800 px-6 pt-10 sm:px-10 lg:col-span-2">
                <div class="pointer-events-none absolute inset-0 bg-dots-light [background-size:18px_18px] opacity-30" aria-hidden="true"></div>
                <x-ui.device-mockup src="/images/projects/socialscheduler.png" alt="Social Scheduler Pro app built by Propify Solutions" variant="browser" class="relative w-full translate-y-6" />
            </div>
        </div>
    </section>

    {{-- Trust strip --}}
    <section class="border-y border-slate-200/70 bg-slate-50/70 py-12 dark:border-white/10 dark:bg-white/[0.02]" aria-labelledby="trust-heading">
        <div class="container-page text-center">
            <h2 id="trust-heading" class="text-base font-medium text-slate-900 dark:text-white">
                Built on platforms trusted across Africa —
                <span class="text-primary-600 dark:text-primary-400">for businesses that choose speed over uncertainty.</span>
            </h2>
            <ul class="mt-8 flex flex-wrap items-center justify-center gap-x-12 gap-y-6">
                @foreach ($partners as $partner)
                    <li><img src="{{ $partner['logo'] }}" alt="{{ $partner['name'] }}" class="h-8 w-auto object-contain opacity-70 grayscale transition hover:opacity-100 hover:grayscale-0 dark:opacity-80 dark:brightness-0 dark:invert" loading="lazy" decoding="async" height="32"></li>
                @endforeach
            </ul>
            <p class="mx-auto mt-8 max-w-xl text-sm text-muted">
                Serving clients in <strong class="text-slate-900 dark:text-white">Nairobi, Kampala, Dar es Salaam, Lagos and Accra</strong> — and teams worldwide.
            </p>
        </div>
    </section>

    {{-- Problem --}}
    <section class="section" aria-labelledby="problem-heading">
        <div class="container-page">
            <x-ui.section-heading id="problem-heading" title="Most software projects fail before they launch">
                <x-slot:body>
                    Too many promising ideas stall on <span class="font-semibold text-red-600 dark:text-red-400">slow delivery, fragile code and runaway budgets</span>. We built our process to avoid all three.
                </x-slot:body>
            </x-ui.section-heading>
            <x-sections.problem-section class="mt-14" />
        </div>
    </section>

    {{-- Approach --}}
    <section class="section pt-0" aria-labelledby="approach-heading">
        <div class="container-page">
            <x-ui.section-heading id="approach-heading" title="A different approach">
                <x-slot:body>
                    Why settle for generic when you can have a <strong class="text-slate-900 dark:text-white">battle-tested, AI-accelerated</strong> team that delivers results?
                </x-slot:body>
            </x-ui.section-heading>
            <x-sections.approach-bento class="mt-14" />
        </div>
    </section>

    {{-- Services --}}
    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="services-heading">
        <div class="container-page">
            <div class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-end">
                <x-ui.section-heading id="services-heading" align="left" eyebrow="What we do" title="Software development services" description="End-to-end product development, from the first sketch to scaling in production." />
                <a href="{{ route('services') }}" class="btn-secondary shrink-0">All services <x-icon name="arrow-right" class="h-4 w-4" /></a>
            </div>
            <ul class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($services as $service)
                    <li><x-sections.service-card :service="$service" /></li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Tech stack --}}
    <section class="section" aria-labelledby="stack-heading">
        <div class="container-page">
            <x-ui.section-heading id="stack-heading" title="Built with proven tools" :description="$yearsExperience.'+ years of shipping production software with these tools'" />
            <x-sections.tech-stack-grid :tech-stack="$techStack" class="mt-14" />
        </div>
    </section>

    {{-- Recent work --}}
    <section class="section pt-0" aria-labelledby="work-heading">
        <div class="container-page">
            <x-ui.section-heading id="work-heading" title="Recent work" description="Real projects, real results. Here's how we've helped businesses ship and grow." />
            <x-sections.case-study-tabs :case-studies="$caseStudies" class="mt-14" />
            <div class="mt-8 text-center">
                <a href="{{ route('portfolio') }}" class="btn-secondary">See all case studies <x-icon name="arrow-right" class="h-4 w-4" /></a>
            </div>
        </div>
    </section>

    {{-- Locations --}}
    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="locations-heading">
        <div class="container-page">
            <x-ui.section-heading id="locations-heading" eyebrow="Where we work" title="Your software partner across Africa" description="Headquartered in Nairobi, delivering across East and West Africa with local payments and compliance built in." />
            <x-sections.locations-band :locations="$locations" class="mt-12" />
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="section" aria-labelledby="testimonials-heading">
        <div class="container-page">
            <x-ui.section-heading id="testimonials-heading" title="What our clients say" />
            <x-sections.testimonial-grid :testimonials="$testimonials" class="mt-14" />
        </div>
    </section>

    {{-- FAQ --}}
    <section class="section bg-gradient-to-b from-white to-primary-50/60 dark:from-ink-950 dark:to-primary-950/20" aria-labelledby="faq-heading">
        <div class="container-page">
            <div class="card mx-auto max-w-4xl p-6 sm:p-12">
                <x-ui.section-heading id="faq-heading" title="Frequently asked questions" description="Everything you need to know about working with us." />
                <x-sections.faq-accordion :faqs="$faqs" class="mt-10" />
                <p class="mt-8 text-center text-sm text-muted">
                    More questions? <a href="{{ route('faq') }}" class="font-semibold text-primary-600 hover:underline dark:text-primary-400">Read the full FAQ</a>
                </p>
            </div>
        </div>
    </section>

    <x-sections.cta-banner />
</x-layouts.app>
