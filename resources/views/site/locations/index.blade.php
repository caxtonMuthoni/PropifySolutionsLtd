<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="Locations" title="One team, five African markets" description="Headquartered in Nairobi, we design and build software for businesses in Kenya, Uganda, Tanzania, Nigeria and Ghana — with local payments, regulation and connectivity in mind." :breadcrumbs="[['label' => 'Locations']]" />
    <section class="section pt-0" aria-label="Markets">
        <div class="container-page">
            <x-sections.locations-band :locations="$locations" />
            <ul class="mt-16 grid gap-6 lg:grid-cols-2">
                @foreach ($locations as $location)
                    <li class="card p-8">
                        <h2 class="text-2xl font-semibold text-slate-950 dark:text-white"><a href="{{ route('locations.show', $location['slug']) }}" class="hover:text-primary-600">{{ $location['headline'] }}</a></h2>
                        <p class="mt-3 text-muted">{{ $location['intro'] }}</p>
                        <p class="mt-5 text-sm font-semibold text-slate-900 dark:text-white">Payments we integrate</p>
                        <ul class="mt-2 flex flex-wrap gap-2">
                            @foreach ($location['payments'] as $payment)
                                <li class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium dark:bg-white/5">{{ $payment }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <x-sections.cta-banner />
</x-layouts.app>
