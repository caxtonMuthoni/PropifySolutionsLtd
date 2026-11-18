<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="Careers" title="Build software that moves Africa forward" description="We're a small, senior-led team in Nairobi working with clients across the continent. If you love shipping great software, we'd love to hear from you." :breadcrumbs="[['label' => 'Careers']]">
        <x-slot:actions>
            <a href="mailto:{{ $careersEmail }}?subject=Job%20application" class="btn-primary">Send your CV <x-icon name="arrow-right" class="h-4 w-4" /></a>
        </x-slot:actions>
    </x-ui.page-hero>

    <section class="section pt-0" aria-labelledby="roles-heading">
        <div class="container-page">
            <h2 id="roles-heading" class="text-3xl font-semibold text-slate-950 dark:text-white">Roles we hire for</h2>
            <p class="mt-3 text-muted">We hire continuously. Email your CV and portfolio with the role in the subject line.</p>
            <ul class="mt-8 flex flex-col divide-y divide-slate-200 rounded-2xl border border-slate-200 dark:divide-white/10 dark:border-white/10">
                @foreach ($tracks as $track)
                    <li class="flex flex-col gap-3 p-6 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-950 dark:text-white">{{ $track['title'] }}</h3>
                            <p class="mt-1 text-sm text-muted">{{ $track['summary'] }}</p>
                        </div>
                        <div class="flex shrink-0 items-center gap-3">
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium dark:bg-white/5">{{ $track['type'] }}</span>
                            <a href="mailto:{{ $careersEmail }}?subject={{ rawurlencode($track['title']) }}" class="btn-secondary !py-2">Apply</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="perks-heading">
        <div class="container-page">
            <x-ui.section-heading id="perks-heading" title="Why work with us" />
            <ul class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($perks as $perk)
                    <li class="card p-6">
                        <h3 class="font-semibold text-slate-950 dark:text-white">{{ $perk['title'] }}</h3>
                        <p class="mt-2 text-sm text-muted">{{ $perk['body'] }}</p>
                    </li>
                @endforeach
            </ul>
            <h2 class="mt-20 text-center text-2xl font-semibold text-slate-950 dark:text-white">Our values</h2>
            <ul class="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($values as $value)
                    <li class="card p-6">
                        <x-service-icon :name="$value['icon']" class="h-6 w-6 text-primary-600 dark:text-primary-400" />
                        <h3 class="mt-4 font-semibold text-slate-950 dark:text-white">{{ $value['title'] }}</h3>
                        <p class="mt-2 text-sm text-muted">{{ $value['body'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layouts.app>
