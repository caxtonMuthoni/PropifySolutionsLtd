<?php

namespace App\Http\Controllers;

use App\Services\Content\CaseStudyCatalog;
use App\Services\Content\CompanyContent;
use App\Services\Content\IndustryCatalog;
use App\Services\Content\ServiceCatalog;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    public function index(SeoService $seo, ServiceCatalog $services, IndustryCatalog $industries, CompanyContent $company): View
    {
        $allServices = $services->all();

        return view('site.services.index', [
            'seo' => $seo->page(
                title: 'Software Development Services in Kenya & Africa',
                description: 'Custom web applications, mobile apps, SaaS platforms, AI automation, M-Pesa and mobile money integrations, UI/UX design and DevOps from a Nairobi-based software team.',
                path: '/services',
                keywords: ['software development services Kenya', 'web development services Nairobi', 'mobile app development Africa', 'M-Pesa integration'],
                breadcrumbs: [['name' => 'Services', 'path' => '/services']],
                schema: [$seo->itemList('/services', 'Software development services', collect($allServices)->map(fn (array $service): array => [
                    'name' => $service['title'],
                    'path' => "/services/{$service['slug']}",
                ])->all())],
            ),
            'services' => $allServices,
            'industries' => $industries->all(),
            'steps' => $company->processSteps(),
        ]);
    }

    public function show(string $slug, SeoService $seo, ServiceCatalog $services, CaseStudyCatalog $caseStudies): View
    {
        $service = $services->find($slug) ?? abort(404);
        $path = "/services/{$slug}";

        return view('site.services.show', [
            'seo' => $seo->page(
                title: "{$service['title']} in Kenya & Africa",
                description: "{$service['summary']} {$service['title']} for businesses in Nairobi, Kenya, Uganda, Tanzania, Nigeria and Ghana.",
                path: $path,
                keywords: $service['keywords'],
                breadcrumbs: [['name' => 'Services', 'path' => '/services'], ['name' => $service['short_title'], 'path' => $path]],
                schema: array_values(array_filter([
                    $seo->service($path, $service['title'], $service['description'], $service['short_title']),
                    $service['faqs'] !== [] ? $seo->faqPage($path, $service['faqs']) : null,
                ])),
            ),
            'service' => $service,
            'caseStudies' => $caseStudies->forService($slug),
            'otherServices' => collect($services->all())->reject(fn (array $other): bool => $other['slug'] === $slug)->values()->all(),
        ]);
    }
}
