<?php

use App\Services\Content\ArticleCatalog;
use App\Services\Content\CaseStudyCatalog;
use App\Services\Content\IndustryCatalog;
use App\Services\Content\LocationCatalog;
use App\Services\Content\ServiceCatalog;

it('server-renders every static public page with SEO metadata', function (string $path, string $view, string $heading) {
    $this->get($path)
        ->assertSuccessful()
        ->assertViewIs($view)
        ->assertSee('<link rel="canonical" href="'.config('agency.site_url').$path.'">', false)
        ->assertSee('<meta name="description"', false)
        ->assertSee('application/ld+json', false)
        ->assertSee($heading)
        ->assertSee('Web Applications', false);
})->with([
    'home' => ['/', 'site.home', 'weeks, not months'],
    'about' => ['/about', 'site.about', 'Our story'],
    'services' => ['/services', 'site.services.index', 'Industries we serve'],
    'portfolio' => ['/portfolio', 'site.portfolio.index', 'Software that ships'],
    'industries' => ['/industries', 'site.industries.index', 'Fintech & Financial Services'],
    'locations' => ['/locations', 'site.locations.index', 'One team, five African markets'],
    'insights' => ['/insights', 'site.insights.index', 'M-Pesa Daraja API Integration'],
    'process' => ['/process', 'site.process', 'What you can expect from us'],
    'faq' => ['/faq', 'site.faq', 'Who owns the code?'],
    'careers' => ['/careers', 'site.careers', 'Roles we hire for'],
    'contact' => ['/contact', 'site.contact', 'Project enquiry'],
    'privacy' => ['/privacy-policy', 'site.legal.privacy', 'Your rights'],
    'terms' => ['/terms', 'site.legal.terms', 'Governing law'],
]);

it('server-renders every detail page from the content catalogs', function () {
    $detailPages = [
        'services' => app(ServiceCatalog::class)->all(),
        'portfolio' => app(CaseStudyCatalog::class)->all(),
        'industries' => app(IndustryCatalog::class)->all(),
        'locations' => app(LocationCatalog::class)->all(),
        'insights' => app(ArticleCatalog::class)->all(),
    ];

    foreach ($detailPages as $prefix => $items) {
        foreach ($items as $item) {
            $this->get("/{$prefix}/{$item['slug']}")
                ->assertSuccessful()
                ->assertSee('<link rel="canonical" href="'.config('agency.site_url')."/{$prefix}/{$item['slug']}\">", false)
                ->assertSee(e($item['title'] ?? $item['headline']), false);
        }
    }
});

it('returns a branded not found page for unknown slugs', function (string $path) {
    $this->get($path)
        ->assertNotFound()
        ->assertSee("We couldn't find that page")
        ->assertSee('<meta name="robots" content="noindex, nofollow">', false);
})->with([
    '/services/does-not-exist',
    '/portfolio/does-not-exist',
    '/industries/does-not-exist',
    '/locations/does-not-exist',
    '/insights/does-not-exist',
    '/this-page-does-not-exist',
]);

it('no longer serves a pricing page or public prices', function () {
    $this->get('/pricing')->assertNotFound();
    $this->get('/pricing.md')->assertNotFound();

    $this->get('/')->assertDontSee('$6,000')->assertDontSee('Fair and transparent pricing');
    $this->get('/insights/cost-to-build-an-app-in-kenya')->assertDontSee('$1,500');
});

it('renders meta tags, geo tags and JSON-LD into the HTML', function () {
    $this->get('/locations/lagos-nigeria')
        ->assertSuccessful()
        ->assertSee('<title>Software Development Company Serving Lagos, Nigeria | Propify Solutions</title>', false)
        ->assertSee('<meta name="geo.region" content="NG-LA">', false)
        ->assertSee('type="text/markdown" href="'.config('agency.site_url').'/locations/lagos-nigeria.md"', false)
        ->assertSee('"@type":"FAQPage"', false)
        ->assertSee('"@type":"BreadcrumbList"', false);
});

it('includes organization schema with every target market as area served', function () {
    $html = $this->get('/')->getContent();

    preg_match('/<script type="application\/ld\+json">(.*?)<\/script>/s', $html, $matches);
    $graph = json_decode($matches[1], true)['@graph'];
    $organization = collect($graph)->firstWhere('@id', config('agency.site_url').'/#organization');

    expect(collect($organization['areaServed'])->pluck('name')->all())
        ->toContain('Nairobi', 'Kenya', 'Uganda', 'Tanzania', 'Nigeria', 'Ghana');
});

it('renders case study tab content in the HTML for crawlers', function () {
    $this->get('/')
        ->assertSee('role="tablist"', false)
        ->assertSee('Read the Social Scheduler Pro case study', false);
});

it('loads Livewire and Alpine on pages without Livewire components', function () {
    $this->get('/about')->assertSee('livewire', false)->assertSee('x-data', false);
});

it('shows the CEO, team and team photo sections on the about page', function () {
    $this->get('/about')
        ->assertSuccessful()
        ->assertSeeInOrder(['Our story', 'A word from our CEO', 'One team, one Nairobi office', 'Our values', 'How we work'])
        ->assertSee(config('agency.team.ceo.role'))
        ->assertDontSee('The people behind your product');
});

it('publishes the CEO in structured data and skips placeholder names', function () {
    $this->get('/about')
        ->assertSee('Caxton Muthoni')
        ->assertSee('"@type":"Person","name":"Caxton Muthoni","jobTitle":"Founder & CEO"', false)
        ->assertSee('"founder":{"@type":"Person","name":"Caxton Muthoni"', false);

    config(['agency.team.ceo.name' => '[CEO name]']);

    $this->get('/about')->assertDontSee('"@type":"Person"', false);
});

it('lists About before Services in the main navigation', function () {
    $this->get('/')->assertSeeInOrder(['>About</a>', 'Services'], false);
});

it('renders the process as a tree without week durations', function () {
    $this->get('/process')
        ->assertSuccessful()
        ->assertSee('Step 01')
        ->assertSee('Step 05')
        ->assertDontSee('Week 1')
        ->assertDontSee('2-week sprints')
        ->assertDontSee('Weeks 1–2');
});
