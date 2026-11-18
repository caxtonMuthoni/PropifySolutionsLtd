<?php

namespace App\Http\Controllers;

use App\Services\Content\CompanyContent;
use App\Services\Content\FaqCatalog;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function process(SeoService $seo, CompanyContent $company): View
    {
        $steps = $company->processSteps();

        return view('site.process', [
            'seo' => $seo->page(
                title: 'Our Process – How We Build Software',
                description: 'Discovery, design, two-week build sprints, launch and ongoing support. See exactly how Propify Solutions takes your product from idea to production.',
                path: '/process',
                keywords: ['software development process', 'agile software development Kenya', 'MVP development process'],
                breadcrumbs: [['name' => 'Process', 'path' => '/process']],
                schema: [[
                    '@type' => 'HowTo',
                    '@id' => $seo->url('/process').'#howto',
                    'name' => 'How Propify Solutions builds software',
                    'step' => collect($steps)->values()->map(fn (array $step, int $index): array => [
                        '@type' => 'HowToStep',
                        'position' => $index + 1,
                        'name' => $step['title'],
                        'text' => $step['summary'],
                    ])->all(),
                ]],
            ),
            'steps' => $steps,
        ]);
    }

    public function faq(SeoService $seo, FaqCatalog $faqs): View
    {
        $allFaqs = $faqs->all();

        return view('site.faq', [
            'seo' => $seo->page(
                title: 'Frequently Asked Questions',
                description: 'Answers about timelines, quotes, payment methods, code ownership, support and working with Propify Solutions from Kenya, Uganda, Tanzania, Nigeria or Ghana.',
                path: '/faq',
                keywords: ['software development FAQ', 'hiring a software agency Kenya'],
                breadcrumbs: [['name' => 'FAQ', 'path' => '/faq']],
                schema: [$seo->faqPage('/faq', $allFaqs)],
            ),
            'faqs' => $allFaqs,
        ]);
    }

    public function careers(SeoService $seo, CompanyContent $company): View
    {
        return view('site.careers', [
            'seo' => $seo->page(
                title: 'Careers – Software Engineering Jobs in Nairobi',
                description: 'Join Propify Solutions. We hire engineers, designers and interns in Nairobi and remotely across Africa to build software that matters.',
                path: '/careers',
                keywords: ['software developer jobs Nairobi', 'tech jobs Kenya', 'remote developer jobs Africa'],
                breadcrumbs: [['name' => 'Careers', 'path' => '/careers']],
            ),
            'tracks' => $company->careerTracks(),
            'perks' => $company->careerPerks(),
            'values' => $company->values(),
            'careersEmail' => config('agency.contact.careers_email'),
        ]);
    }

    public function privacy(SeoService $seo): View
    {
        return view('site.legal.privacy', [
            'seo' => $seo->page(
                title: 'Privacy Policy',
                description: 'How Propify Solutions Ltd collects, uses and protects personal data in line with the Kenya Data Protection Act, 2019.',
                path: '/privacy-policy',
                breadcrumbs: [['name' => 'Privacy Policy', 'path' => '/privacy-policy']],
            ),
            'updatedAt' => '2026-11-18',
        ]);
    }

    public function terms(SeoService $seo): View
    {
        return view('site.legal.terms', [
            'seo' => $seo->page(
                title: 'Terms of Service',
                description: 'The terms that govern use of the Propify Solutions website and our software development services.',
                path: '/terms',
                breadcrumbs: [['name' => 'Terms of Service', 'path' => '/terms']],
            ),
            'updatedAt' => '2026-11-18',
        ]);
    }
}
