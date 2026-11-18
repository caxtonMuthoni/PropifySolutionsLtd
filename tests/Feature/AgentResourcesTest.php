<?php

use App\Services\MarkdownExporter;

it('serves robots.txt that welcomes AI agents and links the sitemap', function () {
    $this->get('/robots.txt')
        ->assertSuccessful()
        ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
        ->assertSee('User-agent: GPTBot')
        ->assertSee('User-agent: ClaudeBot')
        ->assertSee('User-agent: PerplexityBot')
        ->assertSee('Disallow: /dashboard')
        ->assertSee('Sitemap: '.config('agency.site_url').'/sitemap.xml');
});

it('lists every public page in the sitemap', function () {
    $response = $this->get('/sitemap.xml')
        ->assertSuccessful()
        ->assertHeader('Content-Type', 'application/xml; charset=UTF-8');

    $xml = simplexml_load_string($response->getContent());
    $pages = app(MarkdownExporter::class)->pages();

    expect($xml->url)->toHaveCount(count($pages))
        ->and($response->getContent())
        ->toContain(config('agency.site_url').'/locations/nairobi-kenya')
        ->toContain(config('agency.site_url').'/services/api-integrations')
        ->not->toContain('/dashboard');
});

it('serves an llms.txt index with markdown links for every page', function () {
    $this->get('/llms.txt')
        ->assertSuccessful()
        ->assertSee('# Propify Solutions')
        ->assertSee('## Services')
        ->assertSee('## Locations')
        ->assertSee(config('agency.site_url').'/locations/accra-ghana.md')
        ->assertSee('prefill_contact_form');
});

it('serves the full site content in llms-full.txt', function () {
    $this->get('/llms-full.txt')
        ->assertSuccessful()
        ->assertSee('# M-Pesa Daraja API Integration')
        ->assertSee('# Software Development Company Serving Kampala, Uganda')
        ->assertDontSee('/pricing');
});

it('serves markdown versions of pages via the .md suffix', function (string $path, string $expected) {
    $this->get($path)
        ->assertSuccessful()
        ->assertHeader('Content-Type', 'text/markdown; charset=UTF-8')
        ->assertHeader('X-Robots-Tag', 'noindex')
        ->assertSee($expected);
})->with([
    'home' => ['/index.md', '# Propify Solutions — Software Development Company in Nairobi, Kenya'],
    'process' => ['/process.md', '## 03. Build'],
    'service' => ['/services/mobile-app-development.md', '# Mobile App Development'],
    'location' => ['/locations/dar-es-salaam-tanzania.md', 'Vodacom M-Pesa'],
    'article' => ['/insights/cost-to-build-an-app-in-kenya.md', '## The five factors that drive cost'],
]);

it('returns not found for markdown of unknown pages', function () {
    $this->get('/services/unknown-service.md')->assertNotFound();
    $this->get('/nothing-here.md')->assertNotFound();
});

it('negotiates markdown when an agent prefers it over html', function () {
    $this->get('/services', ['Accept' => 'text/markdown, text/html;q=0.8'])
        ->assertSuccessful()
        ->assertHeader('Content-Type', 'text/markdown; charset=UTF-8')
        ->assertHeader('Vary', 'Accept')
        ->assertSee('# Software Development Services');
});

it('serves html to browsers and advertises the markdown alternate', function () {
    $response = $this->get('/process', ['Accept' => 'text/html,application/xhtml+xml,*/*;q=0.8'])
        ->assertSuccessful()
        ->assertHeader('Content-Type', 'text/html; charset=UTF-8');

    expect($response->headers->get('Link'))->toContain(config('agency.site_url').'/process.md');
});
