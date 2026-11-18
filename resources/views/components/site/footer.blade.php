@php
    $socialNames = ['linkedin' => 'LinkedIn', 'github' => 'GitHub', 'x' => 'X', 'facebook' => 'Facebook'];
    $socialIcons = ['linkedin' => 'linkedin', 'github' => 'github', 'x' => 'twitter', 'facebook' => 'facebook'];
    $columns = [
        'Company' => [
            ['label' => 'About', 'href' => route('about')],
            ['label' => 'Our Work', 'href' => route('portfolio')],
            ['label' => 'Process', 'href' => route('process')],
            ['label' => 'Careers', 'href' => route('careers')],
            ['label' => 'Contact', 'href' => route('contact')],
        ],
        'Services' => collect($site['services'])->map(fn (array $service): array => ['label' => $service['title'], 'href' => route('services.show', $service['slug'])])->all(),
        'Locations' => [
            ...collect($site['locations'])->map(fn (array $location): array => ['label' => "{$location['city']}, {$location['country']}", 'href' => route('locations.show', $location['slug'])])->all(),
            ['label' => 'All locations', 'href' => route('locations')],
        ],
        'Resources' => [
            ['label' => 'Insights', 'href' => route('insights')],
            ['label' => 'Industries', 'href' => route('industries')],
            ['label' => 'FAQ', 'href' => route('faq')],
        ],
    ];
@endphp

<footer class="border-t border-slate-200/70 bg-white dark:border-white/10 dark:bg-ink-950" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="container-page py-16">
        <div class="grid gap-12 lg:grid-cols-12">
            <div class="flex flex-col gap-5 lg:col-span-4">
                <x-logo />
                <p class="max-w-sm text-sm leading-relaxed text-muted">
                    {{ $site['legalName'] }} — a software development company in Nairobi, Kenya, building web, mobile, SaaS and AI products for businesses across Africa.
                </p>
                <address class="flex flex-col gap-2 text-sm not-italic text-slate-700 dark:text-slate-300">
                    <span class="flex items-center gap-2"><x-icon name="map-pin" class="h-4 w-4 text-primary-600" />{{ $site['address'] }}</span>
                    <a href="mailto:{{ $site['contact']['email'] }}" class="flex items-center gap-2 hover:text-primary-600"><x-icon name="mail" class="h-4 w-4 text-primary-600" />{{ $site['contact']['email'] }}</a>
                    <a href="tel:{{ $site['contact']['phone'] }}" class="flex items-center gap-2 hover:text-primary-600"><x-icon name="phone" class="h-4 w-4 text-primary-600" />{{ $site['contact']['phone_display'] }}</a>
                </address>
            </div>

            <nav class="grid grid-cols-2 gap-8 sm:grid-cols-4 lg:col-span-8" aria-label="Footer">
                @foreach ($columns as $title => $links)
                    <div>
                        <h3 class="text-sm font-semibold text-slate-900 dark:text-white">{{ $title }}</h3>
                        <ul class="mt-4 flex flex-col gap-3">
                            @foreach ($links as $link)
                                <li><a href="{{ $link['href'] }}" class="text-sm text-muted transition hover:text-primary-600 dark:hover:text-primary-400">{{ $link['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </nav>
        </div>

        <div class="mt-14 flex flex-col gap-6 rounded-2xl border border-slate-200/80 bg-slate-50 p-6 sm:flex-row sm:items-center sm:justify-between dark:border-white/10 dark:bg-white/5">
            <p class="text-2xl font-semibold tracking-tight text-slate-900 dark:text-white">
                Stay connected with <span class="text-primary-600 dark:text-primary-400">Propify</span>
            </p>
            <div class="flex flex-wrap items-center gap-2">
                @foreach ($site['social'] as $network => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer me" aria-label="Propify Solutions on {{ $socialNames[$network] ?? $network }}" class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-700 transition hover:text-primary-600 dark:border-white/10 dark:bg-ink-900 dark:text-slate-300">
                        <x-icon :name="$socialIcons[$network] ?? 'globe'" class="h-4 w-4" />
                    </a>
                @endforeach
                <a href="{{ $site['contact']['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="btn-secondary !py-2.5"><x-icon name="message-circle" class="h-4 w-4" /> WhatsApp</a>
                <a href="mailto:{{ $site['contact']['email'] }}" class="btn-secondary !py-2.5"><x-icon name="mail" class="h-4 w-4" /> {{ $site['contact']['email'] }}</a>
            </div>
        </div>

        <div class="mt-10 flex flex-col gap-4 border-t border-slate-200/70 pt-8 text-sm text-muted sm:flex-row sm:items-center sm:justify-between dark:border-white/10">
            <p>&copy; {{ now()->year }} {{ $site['legalName'] }}. All rights reserved.</p>
            <ul class="flex flex-wrap gap-x-6 gap-y-2">
                <li><a href="{{ route('privacy') }}" class="hover:text-primary-600">Privacy Policy</a></li>
                <li><a href="{{ route('terms') }}" class="hover:text-primary-600">Terms of Service</a></li>
                <li><a href="{{ url('/sitemap.xml') }}" class="hover:text-primary-600">Sitemap</a></li>
                <li><a href="{{ url('/llms.txt') }}" class="hover:text-primary-600">For AI agents</a></li>
            </ul>
        </div>
    </div>
</footer>
