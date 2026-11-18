<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="About us" title="We bridge the gap between technology and business" :description="'Founded in Nairobi in '.$founded.', Propify Solutions is a software development company helping startups, SMEs, NGOs and enterprises across Africa turn ideas into dependable digital products.'" :breadcrumbs="[['label' => 'About']]">
        <dl class="mt-12 grid max-w-4xl grid-cols-2 gap-4 sm:grid-cols-4">
            @foreach ($stats as $stat)
                <div class="card flex flex-col-reverse gap-1 p-5">
                    <dt class="text-sm text-muted">{{ $stat['label'] }}</dt>
                    <dd class="text-3xl font-semibold text-slate-950 dark:text-white">{{ $stat['value'] }}</dd>
                </div>
            @endforeach
        </dl>
    </x-ui.page-hero>

    <section class="section pt-0" aria-labelledby="story-heading">
        <div class="container-page grid items-center gap-12 lg:grid-cols-2">
            <div>
                <h2 id="story-heading" class="text-3xl font-semibold text-slate-950 sm:text-4xl dark:text-white">Our story</h2>
                <div class="mt-6 flex flex-col gap-4 text-lg leading-relaxed text-muted">
                    <p>Propify Solutions started with a simple mission: make great software accessible to African businesses — software that understands mobile money, patchy networks and local regulation as well as it understands modern engineering.</p>
                    <p>What began as a small group of developers building property technology has grown into a full-service product team delivering web platforms, mobile apps, SaaS products and AI automation for clients in Kenya, Uganda, Tanzania, Nigeria, Ghana and beyond.</p>
                    <p>We work as an extension of your team: transparent about cost and progress, honest about trade-offs, and invested in your long-term success.</p>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-primary-600 to-ink-950 p-10 text-white">
                <div class="pointer-events-none absolute inset-0 bg-dots-light [background-size:18px_18px] opacity-25" aria-hidden="true"></div>
                <x-logo-mark class="relative h-20 w-20" />
                <p class="relative mt-8 text-2xl font-semibold leading-snug">“Build and launch your product in weeks, not months — and keep it running for years.”</p>
                <p class="relative mt-4 text-primary-100">Our promise to every client since {{ $founded }}.</p>
            </div>
        </div>
    </section>

    {{-- CEO --}}
    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="ceo-heading">
        <div class="container-page grid items-center gap-12 lg:grid-cols-5">
            <div class="relative lg:col-span-2">
                <div class="absolute -inset-4 -z-10 rounded-[2rem] bg-gradient-to-br from-primary-200 to-accent-300/60 blur-2xl dark:from-primary-900 dark:to-ink-800" aria-hidden="true"></div>
                <x-team-avatar :person="$team['ceo']" size="lg" class="aspect-[4/5] w-full rounded-3xl shadow-2xl" />
            </div>
            <div class="lg:col-span-3">
                <p class="eyebrow">A word from our CEO</p>
                <h2 id="ceo-heading" class="mt-4 text-3xl font-semibold text-slate-950 sm:text-4xl dark:text-white">Building software Africa can rely on</h2>
                <x-icon name="quote" class="mt-8 h-10 w-10 text-primary-300 dark:text-primary-700" />
                <blockquote class="mt-4 flex flex-col gap-4 text-lg leading-relaxed text-slate-700 dark:text-slate-300">
                    @foreach ($team['ceo']['message'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </blockquote>
                <div class="mt-8 flex items-center gap-4 border-t border-slate-200 pt-6 dark:border-white/10">
                    <div>
                        <p class="text-lg font-semibold text-slate-950 dark:text-white">{{ $team['ceo']['name'] }}</p>
                        <p class="text-sm text-muted">{{ $team['ceo']['role'] }}, {{ $site['legalName'] }}</p>
                    </div>
                    @if ($team['ceo']['linkedin'])
                        <a href="{{ $team['ceo']['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="ml-auto flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-700 hover:text-primary-600 dark:border-white/10 dark:text-slate-300" aria-label="{{ $team['ceo']['name'] }} on LinkedIn"><x-icon name="linkedin" class="h-4 w-4" /></a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Team photo --}}
    <section class="section" aria-labelledby="team-photo-heading">
        <div class="container-page">
            <figure class="relative overflow-hidden rounded-3xl">
                @if (is_file(public_path(ltrim($team['group_photo'], '/'))))
                    <img src="{{ $team['group_photo'] }}" srcset="{{ str_replace('.jpg', '-800.jpg', $team['group_photo']) }} 800w, {{ $team['group_photo'] }} 1600w" sizes="(min-width: 1280px) 1216px, 100vw" alt="{{ $team['group_caption'] }}" class="aspect-[4/3] w-full object-cover object-[55%_50%] sm:aspect-[16/9]" loading="lazy" decoding="async" width="1600" height="900">
                @else
                    <div class="flex aspect-[21/9] min-h-72 w-full items-center justify-center bg-gradient-to-br from-primary-600 via-primary-800 to-ink-950" aria-hidden="true">
                        <div class="flex -space-x-4">
                            <x-team-avatar :person="$team['ceo']" class="h-20 w-20 rounded-full ring-4 ring-white/20 sm:h-24 sm:w-24" />
                        </div>
                    </div>
                @endif
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ink-950/85 via-ink-950/10 to-transparent" aria-hidden="true"></div>
                <figcaption class="absolute inset-x-0 bottom-0 flex flex-col gap-4 p-6 text-white sm:flex-row sm:items-end sm:justify-between sm:p-10">
                    <div>
                        <h2 id="team-photo-heading" class="text-2xl font-semibold sm:text-3xl">One team, one Nairobi office</h2>
                        <p class="mt-2 max-w-lg text-slate-200">{{ $team['group_caption'] }} Working together with clients across Kenya, Uganda, Tanzania, Nigeria and Ghana.</p>
                    </div>
                    <a href="{{ route('careers') }}" class="btn shrink-0 bg-white text-primary-700 hover:bg-primary-50">Join the team <x-icon name="arrow-right" class="h-4 w-4" /></a>
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="values-heading">
        <div class="container-page">
            <x-ui.section-heading id="values-heading" title="Our values" description="The principles behind every project we take on." />
            <ul class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($values as $value)
                    <li class="card p-6">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-primary-500 to-primary-700 text-white shadow-glow"><x-service-icon :name="$value['icon']" class="h-5 w-5" /></span>
                        <h3 class="mt-5 font-semibold text-slate-950 dark:text-white">{{ $value['title'] }}</h3>
                        <p class="mt-2 text-sm text-muted">{{ $value['body'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="section" aria-labelledby="about-process-heading">
        <div class="container-page">
            <x-ui.section-heading id="about-process-heading" title="How we work" />
            <x-sections.process-timeline :steps="$steps" class="mt-12" />
        </div>
    </section>

    <section class="section pt-0" aria-labelledby="about-industries-heading">
        <div class="container-page">
            <h2 id="about-industries-heading" class="text-2xl font-semibold text-slate-950 dark:text-white">Industries we know well</h2>
            <ul class="mt-6 flex flex-wrap gap-2">
                @foreach ($industries as $industry)
                    <li><a href="{{ route('industries.show', $industry['slug']) }}" class="btn-secondary !py-2"><x-service-icon :name="$industry['icon']" class="h-4 w-4 text-primary-600" />{{ $industry['title'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </section>

    <x-sections.cta-banner title="Let's build something great together" />
</x-layouts.app>
