<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="Insights" title="Guides for building software in Africa" description="Practical advice on costs, payments, compliance and product delivery from our engineering team." :breadcrumbs="[['label' => 'Insights']]" />
    <section class="section pt-0" aria-label="Articles">
        <ul class="container-page grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($articles as $article)
                <li><x-sections.article-card :article="$article" /></li>
            @endforeach
        </ul>
    </section>
    <x-sections.cta-banner />
</x-layouts.app>
