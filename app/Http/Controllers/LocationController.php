<?php

namespace App\Http\Controllers;

use App\Services\Content\CaseStudyCatalog;
use App\Services\Content\LocationCatalog;
use App\Services\Content\ServiceCatalog;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;

class LocationController extends Controller
{
    public function index(SeoService $seo, LocationCatalog $locations): View
    {
        $allLocations = $locations->all();

        return view('site.locations.index', [
            'seo' => $seo->page(
                title: 'Software Development Across Africa – Kenya, Uganda, Tanzania, Nigeria & Ghana',
                description: 'From our Nairobi headquarters we build software for clients in Kenya, Uganda, Tanzania, Nigeria and Ghana, with local payments and data protection compliance built in.',
                path: '/locations',
                keywords: ['software development company Africa', 'software company East Africa', 'software development West Africa'],
                breadcrumbs: [['name' => 'Locations', 'path' => '/locations']],
                schema: [$seo->itemList('/locations', 'Markets served', collect($allLocations)->map(fn (array $location): array => [
                    'name' => $location['headline'],
                    'path' => "/locations/{$location['slug']}",
                ])->all())],
            ),
            'locations' => $allLocations,
        ]);
    }

    public function show(string $slug, SeoService $seo, LocationCatalog $locations, ServiceCatalog $services, CaseStudyCatalog $caseStudies): View
    {
        $location = $locations->find($slug) ?? abort(404);
        $path = "/locations/{$slug}";
        $place = "{$location['city']}, {$location['country']}";

        return view('site.locations.show', [
            'seo' => $seo->page(
                title: $location['headline'],
                description: "Custom software, web and mobile app development for businesses in {$place}. {$location['country']} payments, local compliance and a dedicated team from Propify Solutions.",
                path: $path,
                keywords: [
                    "software development company {$location['city']}",
                    "software development company {$location['country']}",
                    "web developers {$location['city']}",
                    "mobile app developers {$location['country']}",
                    "app development {$location['city']}",
                ],
                breadcrumbs: [['name' => 'Locations', 'path' => '/locations'], ['name' => $place, 'path' => $path]],
                schema: [
                    $seo->service($path, "Software Development in {$place}", $location['intro'], 'Custom software development', [$location['country']]),
                    $seo->faqPage($path, $location['faqs']),
                ],
                geo: [
                    'region' => $location['region_code'],
                    'placename' => $place,
                    'position' => "{$location['latitude']};{$location['longitude']}",
                ],
            ),
            'location' => $location,
            'services' => $services->all(),
            'caseStudies' => array_slice($caseStudies->all(), 0, 3),
            'otherLocations' => collect($locations->all())->reject(fn (array $other): bool => $other['slug'] === $slug)->values()->all(),
        ]);
    }
}
