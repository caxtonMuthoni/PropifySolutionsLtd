<?php

namespace App\Http\Controllers;

use App\Services\Content\CaseStudyCatalog;
use App\Services\Content\ServiceCatalog;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    public function index(SeoService $seo, CaseStudyCatalog $caseStudies): View
    {
        $allCaseStudies = $caseStudies->all();

        return view('site.portfolio.index', [
            'seo' => $seo->page(
                title: 'Portfolio & Case Studies',
                description: 'Real estate marketplaces, SaaS platforms, AI tools, farm automation and hospitality systems built by Propify Solutions for clients in Kenya and beyond.',
                path: '/portfolio',
                keywords: ['software portfolio Kenya', 'case studies software development Nairobi', 'web app projects Kenya'],
                breadcrumbs: [['name' => 'Portfolio', 'path' => '/portfolio']],
                schema: [$seo->itemList('/portfolio', 'Case studies', collect($allCaseStudies)->map(fn (array $caseStudy): array => [
                    'name' => $caseStudy['title'],
                    'path' => "/portfolio/{$caseStudy['slug']}",
                ])->all())],
            ),
            'caseStudies' => $allCaseStudies,
        ]);
    }

    public function show(string $slug, SeoService $seo, CaseStudyCatalog $caseStudies, ServiceCatalog $services): View
    {
        $caseStudy = $caseStudies->find($slug) ?? abort(404);
        $path = "/portfolio/{$slug}";
        $image = $seo->url($caseStudy['image']);

        return view('site.portfolio.show', [
            'seo' => $seo->page(
                title: "{$caseStudy['title']} – Case Study",
                description: $caseStudy['summary'],
                path: $path,
                keywords: [$caseStudy['industry'].' software', $caseStudy['category'], 'case study'],
                breadcrumbs: [['name' => 'Portfolio', 'path' => '/portfolio'], ['name' => $caseStudy['name'], 'path' => $path]],
                schema: [[
                    '@type' => 'CreativeWork',
                    '@id' => $seo->url($path).'#casestudy',
                    'name' => $caseStudy['title'],
                    'description' => $caseStudy['summary'],
                    'image' => $image,
                    'genre' => $caseStudy['category'],
                    'creator' => ['@id' => $seo->organizationId()],
                    'keywords' => implode(', ', $caseStudy['stack']),
                ]],
                image: $image,
            ),
            'caseStudy' => $caseStudy,
            'services' => collect($caseStudy['services'])->map(fn (string $serviceSlug): ?array => $services->find($serviceSlug))->filter()->values()->all(),
            'moreCaseStudies' => collect($caseStudies->all())->reject(fn (array $other): bool => $other['slug'] === $slug)->take(3)->values()->all(),
        ]);
    }
}
