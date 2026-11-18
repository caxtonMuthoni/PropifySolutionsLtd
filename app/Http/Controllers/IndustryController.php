<?php

namespace App\Http\Controllers;

use App\Services\Content\CaseStudyCatalog;
use App\Services\Content\IndustryCatalog;
use App\Services\Content\ServiceCatalog;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;

class IndustryController extends Controller
{
    public function index(SeoService $seo, IndustryCatalog $industries): View
    {
        $allIndustries = $industries->all();

        return view('site.industries.index', [
            'seo' => $seo->page(
                title: 'Industries We Build Software For',
                description: 'Fintech, real estate, agritech, logistics, hospitality, education, healthcare and e-commerce software for businesses in Kenya and across Africa.',
                path: '/industries',
                keywords: ['fintech software development Kenya', 'proptech Kenya', 'agritech software Africa', 'logistics software Nigeria'],
                breadcrumbs: [['name' => 'Industries', 'path' => '/industries']],
                schema: [$seo->itemList('/industries', 'Industries', collect($allIndustries)->map(fn (array $industry): array => [
                    'name' => $industry['title'],
                    'path' => "/industries/{$industry['slug']}",
                ])->all())],
            ),
            'industries' => $allIndustries,
        ]);
    }

    public function show(string $slug, SeoService $seo, IndustryCatalog $industries, ServiceCatalog $services, CaseStudyCatalog $caseStudies): View
    {
        $industry = $industries->find($slug) ?? abort(404);
        $path = "/industries/{$slug}";

        return view('site.industries.show', [
            'seo' => $seo->page(
                title: "{$industry['title']} Software Development",
                description: "{$industry['summary']} Built by Propify Solutions for clients in Kenya, Uganda, Tanzania, Nigeria and Ghana.",
                path: $path,
                keywords: [strtolower($industry['title']).' software Kenya', strtolower($industry['title']).' app development Africa'],
                breadcrumbs: [['name' => 'Industries', 'path' => '/industries'], ['name' => $industry['title'], 'path' => $path]],
                schema: [$seo->service($path, "{$industry['title']} Software Development", $industry['description'], 'Custom software development')],
            ),
            'industry' => $industry,
            'services' => collect($industry['services'])->map(fn (string $serviceSlug): ?array => $services->find($serviceSlug))->filter()->values()->all(),
            'caseStudies' => collect($caseStudies->all())->filter(fn (array $caseStudy): bool => str_contains(strtolower($industry['title']), strtolower($caseStudy['industry'])))->values()->all(),
            'otherIndustries' => collect($industries->all())->reject(fn (array $other): bool => $other['slug'] === $slug)->values()->all(),
        ]);
    }
}
