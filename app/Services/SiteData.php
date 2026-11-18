<?php

namespace App\Services;

use App\Services\Content\IndustryCatalog;
use App\Services\Content\LocationCatalog;
use App\Services\Content\ServiceCatalog;

/**
 * Company details and navigation data shared with every view.
 */
class SiteData
{
    public function __construct(
        public ServiceCatalog $services,
        public LocationCatalog $locations,
        public IndustryCatalog $industries,
    ) {}

    /**
     * @return array{
     *     name: string,
     *     legalName: string,
     *     description: string,
     *     founded: int,
     *     contact: array<string, string>,
     *     address: string,
     *     social: array<string, string>,
     *     services: list<array{slug: string, title: string, summary: string, icon: string}>,
     *     locations: list<array{slug: string, city: string, country: string}>,
     *     industries: list<array{slug: string, title: string}>
     * }
     */
    public function toArray(): array
    {
        $agency = config('agency');

        return [
            'name' => $agency['name'],
            'legalName' => $agency['legal_name'],
            'description' => $agency['description'],
            'founded' => $agency['founded'],
            'contact' => $agency['contact'],
            'address' => "{$agency['address']['locality']}, {$agency['address']['country_name']}",
            'social' => array_filter($agency['social']),
            'services' => collect($this->services->all())->map(fn (array $service): array => [
                'slug' => $service['slug'],
                'title' => $service['short_title'],
                'summary' => $service['summary'],
                'icon' => $service['icon'],
            ])->all(),
            'locations' => collect($this->locations->all())->map(fn (array $location): array => [
                'slug' => $location['slug'],
                'city' => $location['city'],
                'country' => $location['country'],
            ])->all(),
            'industries' => collect($this->industries->all())->map(fn (array $industry): array => [
                'slug' => $industry['slug'],
                'title' => $industry['title'],
            ])->all(),
        ];
    }
}
