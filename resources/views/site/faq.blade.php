<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="FAQ" title="Frequently asked questions" description="Straight answers about timelines, quotes, ownership and working with us." :breadcrumbs="[['label' => 'FAQ']]" />
    <section class="section pt-0">
        <div class="container-page flex max-w-4xl flex-col gap-14">
            @foreach (collect($faqs)->groupBy('category') as $category => $group)
                <section aria-labelledby="faq-{{ \Illuminate\Support\Str::slug($category) }}">
                    <h2 id="faq-{{ \Illuminate\Support\Str::slug($category) }}" class="text-2xl font-semibold text-slate-950 dark:text-white">{{ $category }}</h2>
                    <x-sections.faq-accordion :faqs="$group->all()" :open-first="false" class="mt-6" />
                </section>
            @endforeach
            <div class="card p-8 text-center">
                <h2 class="text-xl font-semibold text-slate-950 dark:text-white">Still have a question?</h2>
                <p class="mt-2 text-muted">We usually reply within a few hours on business days.</p>
                <a href="{{ route('contact') }}" class="btn-primary mt-6">Ask us directly</a>
            </div>
        </div>
    </section>
</x-layouts.app>
