<?php

namespace App\Http\Controllers;

use App\Services\Content\CaseStudyCatalog;
use App\Services\Content\CompanyContent;
use App\Services\Content\FaqCatalog;
use App\Services\Content\IndustryCatalog;
use App\Services\Content\LocationCatalog;
use App\Services\Content\ServiceCatalog;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(
        SeoService $seo,
        ServiceCatalog $services,
        CaseStudyCatalog $caseStudies,
        FaqCatalog $faqs,
        LocationCatalog $locations,
        CompanyContent $company,
    ): View {
        $featuredFaqs = $faqs->featured();

        return view('site.home', [
            'seo' => $seo->page(
                title: 'Propify Solutions | Software Development Company in Nairobi, Kenya',
                description: 'Nairobi software development company building custom web apps, mobile apps, SaaS and AI automation for businesses in Kenya, Uganda, Tanzania, Nigeria and Ghana. Launch in weeks, not months.',
                path: '/',
                keywords: ['software development company Kenya', 'software development company Nairobi', 'web development Nairobi', 'mobile app developers Kenya', 'SaaS development Africa', 'software company Uganda', 'software developers Tanzania', 'software development Lagos', 'software company Accra'],
                schema: [$seo->faqPage('/', $featuredFaqs)],
            ),
            'stats' => config('agency.stats'),
            'services' => $services->all(),
            'caseStudies' => array_slice($caseStudies->all(), 0, 3),
            'techStack' => $company->techStack(),
            'testimonials' => $company->testimonials(),
            'faqs' => $featuredFaqs,
            'locations' => $locations->all(),
        ]);
    }

    public function about(SeoService $seo, CompanyContent $company, IndustryCatalog $industries): View
    {
        return view('site.about', [
            'seo' => $seo->page(
                title: 'About Us – Nairobi Software Development Team',
                description: 'Founded in Nairobi in '.config('agency.founded').', Propify Solutions is a team of engineers and designers building software for businesses across Kenya, East Africa and West Africa.',
                path: '/about',
                keywords: ['about Propify Solutions', 'software company Nairobi', 'Kenyan software developers', 'tech agency Kenya'],
                breadcrumbs: [['name' => 'About', 'path' => '/about']],
                schema: $this->teamSchema($seo),
            ),
            'team' => config('agency.team'),
            'stats' => config('agency.stats'),
            'founded' => config('agency.founded'),
            'values' => $company->values(),
            'steps' => $company->processSteps(),
            'industries' => $industries->all(),
        ]);
    }

    /**
     * Person schema for named team members; placeholder names in [brackets] are skipped.
     *
     * @return list<array<string, mixed>>
     */
    private function teamSchema(SeoService $seo): array
    {
        $team = config('agency.team');

        return collect([$team['ceo']])
            ->reject(fn (array $person): bool => str_starts_with($person['name'], '['))
            ->map(fn (array $person): array => array_filter([
                '@type' => 'Person',
                'name' => $person['name'],
                'jobTitle' => $person['role'],
                'image' => is_file(public_path(ltrim($person['photo'], '/'))) ? $seo->url($person['photo']) : null,
                'sameAs' => $person['linkedin'] ? [$person['linkedin']] : null,
                'worksFor' => ['@id' => $seo->organizationId()],
            ]))
            ->values()
            ->all();
    }
}
