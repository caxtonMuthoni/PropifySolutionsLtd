<?php

namespace App\Services;

use App\Services\Content\ArticleCatalog;
use App\Services\Content\CaseStudyCatalog;
use App\Services\Content\CompanyContent;
use App\Services\Content\FaqCatalog;
use App\Services\Content\IndustryCatalog;
use App\Services\Content\LocationCatalog;
use App\Services\Content\ServiceCatalog;

/**
 * Renders every public page as clean Markdown for AI agents, and produces
 * the site index used by the sitemap and llms.txt.
 */
class MarkdownExporter
{
    public function __construct(
        public SeoService $seo,
        public ServiceCatalog $services,
        public CaseStudyCatalog $caseStudies,
        public IndustryCatalog $industries,
        public LocationCatalog $locations,
        public ArticleCatalog $articles,
        public FaqCatalog $faqs,
        public CompanyContent $company,
    ) {}

    /**
     * Every public, indexable page.
     *
     * @return list<array{path: string, title: string, summary: string, section: string, priority: string, changefreq: string, lastmod: string}>
     */
    public function pages(): array
    {
        $updated = '2026-11-18';

        $page = fn (string $path, string $title, string $summary, string $section, string $priority = '0.7', string $changefreq = 'monthly', ?string $lastmod = null): array => [
            'path' => $path,
            'title' => $title,
            'summary' => $summary,
            'section' => $section,
            'priority' => $priority,
            'changefreq' => $changefreq,
            'lastmod' => $lastmod ?? $updated,
        ];

        return [
            $page('/', 'Home', config('agency.description'), 'Company', '1.0', 'weekly'),
            $page('/services', 'Services', 'All software development services.', 'Services', '0.9', 'monthly'),
            ...collect($this->services->all())->map(fn (array $service): array => $page("/services/{$service['slug']}", $service['title'], $service['summary'], 'Services', '0.9'))->all(),
            $page('/locations', 'Locations', 'Markets served: Kenya, Uganda, Tanzania, Nigeria and Ghana.', 'Locations', '0.9'),
            ...collect($this->locations->all())->map(fn (array $location): array => $page("/locations/{$location['slug']}", $location['headline'], $location['intro'], 'Locations', '0.9'))->all(),
            $page('/industries', 'Industries', 'Industries we build software for.', 'Industries', '0.8'),
            ...collect($this->industries->all())->map(fn (array $industry): array => $page("/industries/{$industry['slug']}", $industry['title'], $industry['summary'], 'Industries', '0.7'))->all(),
            $page('/portfolio', 'Portfolio', 'Case studies of software we have built.', 'Work', '0.8'),
            ...collect($this->caseStudies->all())->map(fn (array $caseStudy): array => $page("/portfolio/{$caseStudy['slug']}", $caseStudy['title'], $caseStudy['summary'], 'Work', '0.7'))->all(),
            $page('/process', 'Process', 'How we take products from idea to launch.', 'Company', '0.7'),
            $page('/about', 'About', 'Who we are and what we value.', 'Company', '0.7'),
            $page('/faq', 'FAQ', 'Answers to common questions about working with us.', 'Company', '0.6'),
            $page('/insights', 'Insights', 'Guides for building software in Africa.', 'Insights', '0.7', 'weekly'),
            ...collect($this->articles->all())->map(fn (array $article): array => $page("/insights/{$article['slug']}", $article['title'], $article['excerpt'], 'Insights', '0.6', 'yearly', $article['updated_at']))->all(),
            $page('/careers', 'Careers', 'Jobs and internships at Propify Solutions.', 'Company', '0.5'),
            $page('/contact', 'Contact', 'Book a free consultation or request a quote.', 'Company', '0.8'),
            $page('/privacy-policy', 'Privacy Policy', 'How we handle personal data.', 'Legal', '0.2', 'yearly'),
            $page('/terms', 'Terms of Service', 'Terms for using our website and services.', 'Legal', '0.2', 'yearly'),
        ];
    }

    public function forPath(string $path): ?string
    {
        $path = '/'.trim($path, '/');
        $segments = explode('/', trim($path, '/'));

        $body = match (true) {
            $path === '/' => $this->home(),
            $path === '/services' => $this->servicesIndex(),
            $segments[0] === 'services' && count($segments) === 2 => $this->service($segments[1]),
            $path === '/portfolio' => $this->portfolioIndex(),
            $segments[0] === 'portfolio' && count($segments) === 2 => $this->caseStudy($segments[1]),
            $path === '/industries' => $this->industriesIndex(),
            $segments[0] === 'industries' && count($segments) === 2 => $this->industry($segments[1]),
            $path === '/locations' => $this->locationsIndex(),
            $segments[0] === 'locations' && count($segments) === 2 => $this->location($segments[1]),
            $path === '/insights' => $this->insightsIndex(),
            $segments[0] === 'insights' && count($segments) === 2 => $this->article($segments[1]),
            $path === '/process' => $this->process(),
            $path === '/about' => $this->about(),
            $path === '/faq' => $this->faqPage(),
            $path === '/careers' => $this->careers(),
            $path === '/contact' => $this->contact(),
            $path === '/privacy-policy', $path === '/terms' => $this->legal($path),
            default => null,
        };

        if ($body === null) {
            return null;
        }

        return $body."\n\n---\n\nCanonical URL: ".$this->seo->url($path)."\nSite index for agents: ".$this->seo->url('/llms.txt')."\n";
    }

    public function llmsTxt(): string
    {
        $agency = config('agency');
        $lines = [
            "# {$agency['name']}",
            '',
            "> {$agency['description']}",
            '',
            "Founded in {$agency['founded']} and headquartered in {$agency['address']['locality']}, {$agency['address']['country_name']}. Markets served: ".implode(', ', $agency['markets']).'.',
            "Contact: {$agency['contact']['email']} · {$agency['contact']['phone_display']} · WhatsApp {$agency['contact']['whatsapp']}",
            '',
            'Every page below is also available as Markdown by appending `.md` to its URL (the home page is `/index.md`), or by requesting it with the header `Accept: text/markdown`. The full site content is at '.$this->seo->url('/llms-full.txt').'.',
            '',
            '## Agent actions',
            '',
            '- To request a quote or consultation, send the user to '.$this->seo->url('/contact').' (add `?type=call` to pre-select a call, or `?service=<service-slug>` to pre-fill the subject). The form requires a human verification step, so the user must submit it themselves.',
            '- Browsers that support WebMCP expose tools named `list_services`, `open_page` and `prefill_contact_form` on every page.',
        ];

        foreach (collect($this->pages())->groupBy('section') as $section => $pages) {
            $lines[] = '';
            $lines[] = "## {$section}";
            $lines[] = '';

            foreach ($pages as $page) {
                $lines[] = "- [{$page['title']}](".$this->seo->markdownUrl($page['path'])."): {$page['summary']}";
            }
        }

        return implode("\n", $lines)."\n";
    }

    public function llmsFull(): string
    {
        return collect($this->pages())
            ->map(fn (array $page): ?string => $this->forPath($page['path']))
            ->filter()
            ->implode("\n\n========\n\n");
    }

    private function home(): string
    {
        $agency = config('agency');
        $stats = collect($agency['stats'])->map(fn (array $stat): string => "- {$stat['value']} {$stat['label']}")->implode("\n");

        return <<<MD
# {$agency['name']} — Software Development Company in Nairobi, Kenya

{$agency['description']}

Build and launch your product in weeks, not months: we combine proven foundations, AI-accelerated engineering and a senior team that owns delivery end to end.

## At a glance

{$stats}

{$this->serviceList()}

## Markets

{$this->locationList()}

## Selected work

{$this->caseStudyList()}

## Frequently asked questions

{$this->faqList($this->faqs->featured())}

## Get started

Book a free 30-minute consultation: {$this->seo->url('/contact?type=call')}
MD;
    }

    private function servicesIndex(): string
    {
        return "# Software Development Services\n\nCustom software for businesses in Kenya, Uganda, Tanzania, Nigeria and Ghana.\n\n".$this->serviceList();
    }

    private function service(string $slug): ?string
    {
        $service = $this->services->find($slug);

        if ($service === null) {
            return null;
        }

        $deliverables = $this->bullets($service['deliverables']);
        $outcomes = collect($service['outcomes'])->map(fn (array $outcome): string => "- **{$outcome['title']}** — {$outcome['body']}")->implode("\n");
        $stack = implode(', ', $service['stack']);
        $faqs = $service['faqs'] === [] ? '' : "\n\n## FAQ\n\n".$this->faqList($service['faqs']);

        return <<<MD
# {$service['title']}

{$service['summary']}

{$service['description']}

## What you get

{$deliverables}

## Outcomes

{$outcomes}

## Technology

{$stack}{$faqs}

Request a quote: {$this->seo->url("/contact?service={$slug}")}
MD;
    }

    private function portfolioIndex(): string
    {
        return "# Portfolio & Case Studies\n\n".$this->caseStudyList();
    }

    private function caseStudy(string $slug): ?string
    {
        $caseStudy = $this->caseStudies->find($slug);

        if ($caseStudy === null) {
            return null;
        }

        $features = $this->bullets($caseStudy['features']);
        $stack = implode(', ', $caseStudy['stack']);

        return <<<MD
# {$caseStudy['title']}

{$caseStudy['summary']}

- Industry: {$caseStudy['industry']}
- Market: {$caseStudy['market']}
- Platform: {$caseStudy['platform']}
- Technology: {$stack}

## Challenge

{$caseStudy['challenge']}

## Solution

{$caseStudy['solution']}

## Key features

{$features}
MD;
    }

    private function industriesIndex(): string
    {
        $list = collect($this->industries->all())
            ->map(fn (array $industry): string => "- [{$industry['title']}]({$this->seo->url("/industries/{$industry['slug']}")}): {$industry['summary']}")
            ->implode("\n");

        return "# Industries We Serve\n\n{$list}";
    }

    private function industry(string $slug): ?string
    {
        $industry = $this->industries->find($slug);

        if ($industry === null) {
            return null;
        }

        return "# {$industry['title']} Software Development\n\n{$industry['description']}\n\n## Solutions we build\n\n".$this->bullets($industry['solutions']);
    }

    private function locationsIndex(): string
    {
        return "# Locations\n\nWe are headquartered in Nairobi, Kenya and work with clients across East and West Africa.\n\n".$this->locationList();
    }

    private function location(string $slug): ?string
    {
        $location = $this->locations->find($slug);

        if ($location === null) {
            return null;
        }

        $payments = $this->bullets($location['payments']);
        $compliance = collect($location['compliance'])->map(fn (array $item): string => "- **{$item['title']}** — {$item['body']}")->implode("\n");
        $industries = implode(', ', $location['industries']);
        $cities = implode(', ', $location['cities']);

        return <<<MD
# {$location['headline']}

{$location['intro']}

- Time zone: {$location['timezone']}
- Cities served: {$cities}
- Key industries: {$industries}

## Payments we integrate in {$location['country']}

{$payments}

## Compliance

{$compliance}

{$this->serviceList()}

## FAQ

{$this->faqList($location['faqs'])}
MD;
    }

    private function insightsIndex(): string
    {
        $list = collect($this->articles->all())
            ->map(fn (array $article): string => "- [{$article['title']}]({$this->seo->url("/insights/{$article['slug']}")}) ({$article['published_at']}): {$article['excerpt']}")
            ->implode("\n");

        return "# Insights\n\n{$list}";
    }

    private function article(string $slug): ?string
    {
        $article = $this->articles->find($slug);

        if ($article === null) {
            return null;
        }

        return "# {$article['title']}\n\nPublished {$article['published_at']} · {$article['category']}\n\n{$article['body']}";
    }

    private function process(): string
    {
        $steps = collect($this->company->processSteps())
            ->map(fn (array $step): string => "## {$step['step']}. {$step['title']}\n\n{$step['summary']}\n\n".$this->bullets($step['activities'])."\n\nDeliverable: {$step['deliverable']}")
            ->implode("\n\n");

        return "# Our Process\n\n{$steps}";
    }

    private function about(): string
    {
        $agency = config('agency');
        $values = collect($this->company->values())->map(fn (array $value): string => "- **{$value['title']}** — {$value['body']}")->implode("\n");

        return <<<MD
# About {$agency['name']}

{$agency['legal_name']} was founded in {$agency['founded']} in Nairobi, Kenya with a simple mission: bridge the gap between complex technology and real business needs. Today we are a full-service software development company working with startups, SMEs, NGOs and enterprises across Africa and beyond.

## Our values

{$values}
MD;
    }

    private function faqPage(): string
    {
        return "# Frequently Asked Questions\n\n".$this->faqList($this->faqs->all());
    }

    private function careers(): string
    {
        $tracks = collect($this->company->careerTracks())->map(fn (array $track): string => "- **{$track['title']}** ({$track['type']}) — {$track['summary']}")->implode("\n");
        $email = config('agency.contact.careers_email');

        return "# Careers at Propify Solutions\n\n## Roles we hire for\n\n{$tracks}\n\nApply by emailing your CV and portfolio to {$email} with the role in the subject line.";
    }

    private function contact(): string
    {
        $agency = config('agency');
        $hours = collect($agency['opening_hours'])->map(fn (array $hours): string => "- {$hours['label']}: {$hours['display']} (EAT)")->implode("\n");

        return <<<MD
# Contact {$agency['name']}

- Email: {$agency['contact']['email']}
- Phone: {$agency['contact']['phone_display']}
- WhatsApp: {$agency['contact']['whatsapp']}
- Location: {$agency['address']['locality']}, {$agency['address']['country_name']}

## Office hours

{$hours}

## Project enquiry form

The form at {$this->seo->url('/contact')} asks for: name, email, phone, subject, timeline (urgent, 1–3 months, 3–6 months, flexible, not sure), budget (under \$5k, \$5k–\$15k, \$15k–\$50k, \$50k+, not sure, confidential), preferred contact method (email, phone, meeting, video) and a project description. A human verification step is required, so the user must submit it themselves. We reply within 24 hours.
MD;
    }

    private function legal(string $path): string
    {
        $title = $path === '/terms' ? 'Terms of Service' : 'Privacy Policy';

        return "# {$title}\n\nThe full {$title} is published at {$this->seo->url($path)}. For questions email ".config('agency.contact.email').'.';
    }

    private function serviceList(): string
    {
        return "## Services\n\n".collect($this->services->all())
            ->map(fn (array $service): string => "- [{$service['title']}]({$this->seo->url("/services/{$service['slug']}")}): {$service['summary']}")
            ->implode("\n");
    }

    private function locationList(): string
    {
        return collect($this->locations->all())
            ->map(fn (array $location): string => "- [{$location['city']}, {$location['country']}]({$this->seo->url("/locations/{$location['slug']}")})".($location['is_headquarters'] ? ' — headquarters' : ''))
            ->implode("\n");
    }

    private function caseStudyList(): string
    {
        return collect($this->caseStudies->all())
            ->map(fn (array $caseStudy): string => "- [{$caseStudy['title']}]({$this->seo->url("/portfolio/{$caseStudy['slug']}")}) — {$caseStudy['industry']}, {$caseStudy['market']}: {$caseStudy['summary']}")
            ->implode("\n");
    }

    /**
     * @param  list<array{question: string, answer: string}>  $faqs
     */
    private function faqList(array $faqs): string
    {
        return collect($faqs)->map(fn (array $faq): string => "### {$faq['question']}\n\n{$faq['answer']}")->implode("\n\n");
    }

    /**
     * @param  list<string>  $items
     */
    private function bullets(array $items): string
    {
        return collect($items)->map(fn (string $item): string => "- {$item}")->implode("\n");
    }
}
