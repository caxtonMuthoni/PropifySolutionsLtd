<?php

namespace App\Services;

use Illuminate\Support\Str;

/**
 * Builds page metadata and schema.org JSON-LD for every public page.
 *
 * @phpstan-type SeoData array{
 *     title: string,
 *     description: string,
 *     canonical: string,
 *     markdown: string,
 *     image: string,
 *     image_alt: string,
 *     type: string,
 *     keywords: string,
 *     robots: string,
 *     geo: array{region: string, placename: string, position: string}|null,
 *     published_time: string|null,
 *     modified_time: string|null,
 *     json_ld: array<string, mixed>
 * }
 */
class SeoService
{
    /**
     * @param  list<string>  $keywords
     * @param  list<array{name: string, path: string}>  $breadcrumbs
     * @param  list<array<string, mixed>>  $schema
     * @param  array{region: string, placename: string, position: string}|null  $geo
     * @return SeoData
     */
    public function page(
        string $title,
        string $description,
        string $path,
        array $keywords = [],
        array $breadcrumbs = [],
        array $schema = [],
        ?string $image = null,
        string $type = 'website',
        ?array $geo = null,
        ?string $publishedTime = null,
        ?string $modifiedTime = null,
        bool $indexable = true,
    ): array {
        $canonical = $this->url($path);
        $fullTitle = Str::contains($title, config('agency.name')) ? $title : "{$title} | ".config('agency.name');

        $graph = [
            $this->organization(),
            $this->website(),
            [
                '@type' => $type === 'article' ? 'WebPage' : $this->webPageType($path),
                '@id' => "{$canonical}#webpage",
                'url' => $canonical,
                'name' => $fullTitle,
                'description' => $description,
                'inLanguage' => 'en',
                'isPartOf' => ['@id' => $this->url('/').'#website'],
                'about' => ['@id' => $this->organizationId()],
                'primaryImageOfPage' => $image ?? $this->defaultImage(),
                ...($breadcrumbs !== [] ? ['breadcrumb' => ['@id' => "{$canonical}#breadcrumb"]] : []),
            ],
        ];

        if ($breadcrumbs !== []) {
            $graph[] = $this->breadcrumbList($canonical, $breadcrumbs);
        }

        return [
            'title' => $fullTitle,
            'description' => $description,
            'canonical' => $canonical,
            'markdown' => $this->markdownUrl($path),
            'image' => $image ?? $this->defaultImage(),
            'image_alt' => $title,
            'type' => $type,
            'keywords' => implode(', ', $keywords),
            'robots' => $indexable ? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' : 'noindex, follow',
            'geo' => $geo,
            'published_time' => $publishedTime,
            'modified_time' => $modifiedTime,
            'json_ld' => [
                '@context' => 'https://schema.org',
                '@graph' => [...$graph, ...$schema],
            ],
        ];
    }

    public function url(string $path = '/'): string
    {
        $path = '/'.ltrim($path, '/');

        return config('agency.site_url').($path === '/' ? '/' : rtrim($path, '/'));
    }

    public function markdownUrl(string $path): string
    {
        $path = trim($path, '/');

        return $this->url(($path === '' ? 'index' : $path).'.md');
    }

    public function organizationId(): string
    {
        return $this->url('/').'#organization';
    }

    public function defaultImage(): string
    {
        return $this->url('/images/branding/og.png');
    }

    /**
     * @return array<string, mixed>
     */
    public function organization(): array
    {
        $agency = config('agency');

        return [
            '@type' => ['Organization', 'ProfessionalService'],
            '@id' => $this->organizationId(),
            'name' => $agency['name'],
            'legalName' => $agency['legal_name'],
            'alternateName' => ['Propify Solutions Ltd', 'Propify'],
            'url' => $this->url('/'),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => $this->url('/images/branding/logo-mark-512.png'),
                'width' => 512,
                'height' => 512,
            ],
            'image' => $this->defaultImage(),
            'description' => $agency['description'],
            'slogan' => 'Build and launch your product in weeks, not months.',
            'foundingDate' => (string) $agency['founded'],
            ...(str_starts_with($agency['team']['ceo']['name'], '[') ? [] : ['founder' => [
                '@type' => 'Person',
                'name' => $agency['team']['ceo']['name'],
                'jobTitle' => $agency['team']['ceo']['role'],
            ]]),
            'email' => $agency['contact']['email'],
            'telephone' => $agency['contact']['phone'],
            'priceRange' => '$$',
            'currenciesAccepted' => 'KES, USD, UGX, TZS, NGN, GHS',
            'paymentAccepted' => 'M-Pesa, Bank Transfer, Credit Card, Wire Transfer',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => $agency['address']['locality'],
                'addressRegion' => $agency['address']['region'],
                'addressCountry' => $agency['address']['country'],
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => $agency['address']['latitude'],
                'longitude' => $agency['address']['longitude'],
            ],
            'openingHoursSpecification' => collect($agency['opening_hours'])->map(fn (array $hours): array => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => $hours['days'],
                'opens' => $hours['opens'],
                'closes' => $hours['closes'],
            ])->all(),
            'areaServed' => [
                ['@type' => 'City', 'name' => 'Nairobi'],
                ...collect($agency['markets'])->map(fn (string $country): array => ['@type' => 'Country', 'name' => $country])->all(),
                ['@type' => 'Place', 'name' => 'East Africa'],
                ['@type' => 'Place', 'name' => 'West Africa'],
            ],
            'knowsAbout' => [
                'Custom software development', 'Web application development', 'Mobile app development', 'SaaS development',
                'AI integration', 'Business process automation', 'M-Pesa Daraja API', 'Mobile money integration',
                'Laravel', 'Vue.js', 'React', 'Flutter', 'Cloud infrastructure', 'UI/UX design',
            ],
            'contactPoint' => [[
                '@type' => 'ContactPoint',
                'contactType' => 'sales',
                'telephone' => $agency['contact']['phone'],
                'email' => $agency['contact']['email'],
                'areaServed' => ['KE', 'UG', 'TZ', 'NG', 'GH'],
                'availableLanguage' => ['English', 'Swahili'],
            ]],
            'sameAs' => array_values(array_filter($agency['social'])),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function website(): array
    {
        return [
            '@type' => 'WebSite',
            '@id' => $this->url('/').'#website',
            'url' => $this->url('/'),
            'name' => config('agency.name'),
            'description' => config('agency.tagline'),
            'inLanguage' => 'en',
            'publisher' => ['@id' => $this->organizationId()],
        ];
    }

    /**
     * @param  list<array{name: string, path: string}>  $breadcrumbs
     * @return array<string, mixed>
     */
    public function breadcrumbList(string $canonical, array $breadcrumbs): array
    {
        $items = [['name' => 'Home', 'path' => '/'], ...$breadcrumbs];

        return [
            '@type' => 'BreadcrumbList',
            '@id' => "{$canonical}#breadcrumb",
            'itemListElement' => collect($items)->values()->map(fn (array $item, int $index): array => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $this->url($item['path']),
            ])->all(),
        ];
    }

    /**
     * @param  list<array{question: string, answer: string}>  $faqs
     * @return array<string, mixed>
     */
    public function faqPage(string $path, array $faqs): array
    {
        return [
            '@type' => 'FAQPage',
            '@id' => $this->url($path).'#faq',
            'mainEntity' => collect($faqs)->map(fn (array $faq): array => [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['answer']],
            ])->all(),
        ];
    }

    /**
     * @param  list<string>  $areaServed
     * @return array<string, mixed>
     */
    public function service(string $path, string $name, string $description, string $serviceType, array $areaServed = []): array
    {
        return [
            '@type' => 'Service',
            '@id' => $this->url($path).'#service',
            'name' => $name,
            'description' => $description,
            'serviceType' => $serviceType,
            'url' => $this->url($path),
            'provider' => ['@id' => $this->organizationId()],
            'areaServed' => collect($areaServed === [] ? config('agency.markets') : $areaServed)
                ->map(fn (string $country): array => ['@type' => 'Country', 'name' => $country])
                ->all(),
        ];
    }

    /**
     * @param  list<array{name: string, path: string}>  $items
     * @return array<string, mixed>
     */
    public function itemList(string $path, string $name, array $items): array
    {
        return [
            '@type' => 'ItemList',
            '@id' => $this->url($path).'#list',
            'name' => $name,
            'itemListElement' => collect($items)->values()->map(fn (array $item, int $index): array => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'url' => $this->url($item['path']),
            ])->all(),
        ];
    }

    private function webPageType(string $path): string
    {
        return match (trim($path, '/')) {
            'about' => 'AboutPage',
            'contact' => 'ContactPage',
            'services', 'portfolio', 'industries', 'locations', 'insights' => 'CollectionPage',
            default => 'WebPage',
        };
    }
}
