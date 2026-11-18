@php
    $principles = [
        ['title' => 'Fortnightly demos', 'body' => 'See and click through working software every two weeks.', 'icon' => 'calendar-check'],
        ['title' => 'Open project board', 'body' => 'Track every task, bug and decision in real time.', 'icon' => 'eye'],
        ['title' => 'Direct communication', 'body' => 'Talk to the engineers building your product — no middlemen.', 'icon' => 'messages-square'],
        ['title' => 'Your code, your repo', 'body' => 'You own the repository and infrastructure from day one.', 'icon' => 'file-code'],
    ];
@endphp

<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="Process" title="From idea to launch, without the guesswork" description="A clear, repeatable process with working software every two weeks — so you always know what's done, what's next and what it costs." :breadcrumbs="[['label' => 'Process']]" />
    <section class="section pt-0" aria-label="Process steps">
        <div class="container-page"><x-sections.process-timeline :steps="$steps" :detailed="true" /></div>
    </section>
    <section class="section bg-slate-50/70 dark:bg-white/[0.02]" aria-labelledby="principles-heading">
        <div class="container-page">
            <x-ui.section-heading id="principles-heading" title="What you can expect from us" />
            <ul class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($principles as $principle)
                    <li class="card p-6">
                        <x-icon :name="$principle['icon']" class="h-6 w-6 text-primary-600 dark:text-primary-400" />
                        <h3 class="mt-4 font-semibold text-slate-950 dark:text-white">{{ $principle['title'] }}</h3>
                        <p class="mt-2 text-sm text-muted">{{ $principle['body'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <x-sections.cta-banner />
</x-layouts.app>
