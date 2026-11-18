<?php

namespace App\Services\Content;

/**
 * Portfolio case studies.
 *
 * @phpstan-type CaseStudy array{
 *     slug: string,
 *     title: string,
 *     name: string,
 *     category: string,
 *     industry: string,
 *     market: string,
 *     platform: string,
 *     summary: string,
 *     challenge: string,
 *     solution: string,
 *     features: list<string>,
 *     stack: list<string>,
 *     services: list<string>,
 *     image: string
 * }
 */
class CaseStudyCatalog
{
    /**
     * @return list<CaseStudy>
     */
    public function all(): array
    {
        return [
            [
                'slug' => 'propify-real-estate-marketplace',
                'title' => 'Propify – Real Estate Marketplace',
                'name' => 'Propify',
                'category' => 'Web Platform',
                'industry' => 'Real Estate',
                'market' => 'Kenya',
                'platform' => 'Web',
                'summary' => 'A real estate marketplace connecting agents, developers and buyers with verified listings and lead management.',
                'challenge' => 'Property seekers in Kenya were juggling unverified listings across social media and classifieds, while agents had no reliable way to track and follow up on leads.',
                'solution' => 'We built a fast, search-first marketplace with agent dashboards, verified listings, lead routing and secure messaging, optimised for mobile users on limited data.',
                'features' => ['Map and filter-based property search', 'Agent and developer dashboards', 'Lead capture with WhatsApp and email follow-up', 'Listing verification workflow', 'SEO-optimised listing pages'],
                'stack' => ['Laravel', 'Vue.js', 'PostgreSQL', 'Tailwind CSS'],
                'services' => ['web-application-development', 'ui-ux-design', 'cloud-devops'],
                'image' => '/images/projects/propify.png',
            ],
            [
                'slug' => 'social-scheduler-pro',
                'title' => 'Social Scheduler Pro',
                'name' => 'Social Scheduler Pro',
                'category' => 'AI & Automation Platform',
                'industry' => 'Marketing',
                'market' => 'Global',
                'platform' => 'SaaS',
                'summary' => 'An AI-powered social media scheduling platform with multi-account publishing and team collaboration.',
                'challenge' => 'Marketing teams were losing hours manually posting across platforms, with no shared calendar or approval process.',
                'solution' => 'We engineered a multi-tenant SaaS with AI-assisted content drafting, a shared content calendar, approval flows and queued publishing to multiple networks.',
                'features' => ['AI-assisted caption and content generation', 'Multi-account, multi-network publishing', 'Team roles and approval workflow', 'Content calendar with drag-and-drop', 'Subscription billing'],
                'stack' => ['Laravel', 'Vue.js', 'Redis', 'OpenAI API'],
                'services' => ['saas-development', 'ai-automation'],
                'image' => '/images/projects/socialscheduler.png',
            ],
            [
                'slug' => 'rezimi-ai-resume-builder',
                'title' => 'Rezimi – AI Resume Builder',
                'name' => 'Rezimi',
                'category' => 'SaaS Application',
                'industry' => 'HR & Careers',
                'market' => 'Global',
                'platform' => 'SaaS',
                'summary' => 'A SaaS application that uses AI to generate and tailor professional resumes to specific job descriptions.',
                'challenge' => 'Job seekers struggled to tailor their CVs for each application, and generic templates were filtered out by applicant tracking systems.',
                'solution' => 'Rezimi analyses a job description and rewrites resume content to match, then exports ATS-friendly documents from professionally designed templates.',
                'features' => ['Job-description-aware AI rewriting', 'ATS-friendly PDF templates', 'Multiple resume versions per user', 'Freemium subscription model'],
                'stack' => ['Laravel', 'Vue.js', 'OpenAI API', 'MySQL'],
                'services' => ['saas-development', 'ai-automation', 'ui-ux-design'],
                'image' => '/images/projects/rezimi.png',
            ],
            [
                'slug' => 'farm-operations-automation',
                'title' => 'Farm Operations Automation System',
                'name' => 'Mkulima',
                'category' => 'Automation System',
                'industry' => 'Agriculture',
                'market' => 'Kenya',
                'platform' => 'Web & Mobile',
                'summary' => 'A digital farm management system that automates operations and turns field activity into decisions.',
                'challenge' => 'Farm managers relied on paper records, making it hard to track inputs, labour and yields across plots or spot problems early.',
                'solution' => 'We built an offline-capable system for logging activities in the field, tracking inventory and labour, and reporting on yields and costs per plot.',
                'features' => ['Offline-first activity logging', 'Inventory and input tracking', 'Labour and payroll records', 'Yield and cost reports per plot'],
                'stack' => ['Laravel', 'Vue.js', 'MySQL'],
                'services' => ['web-application-development', 'ai-automation'],
                'image' => '/images/projects/mkulima.png',
            ],
            [
                'slug' => 'omnifood-food-delivery',
                'title' => 'Omnifood – Food Delivery Platform',
                'name' => 'Omnifood',
                'category' => 'E-commerce Application',
                'industry' => 'Food & Beverage',
                'market' => 'Kenya',
                'platform' => 'Web',
                'summary' => 'A food delivery web app for online ordering, menu management and restaurant–customer coordination.',
                'challenge' => 'Restaurants needed to accept online orders without paying high marketplace commissions or losing their customer relationships.',
                'solution' => 'Omnifood gives restaurants their own ordering storefront with menu management, order tracking and mobile money checkout.',
                'features' => ['Menu and pricing management', 'Real-time order status', 'Mobile money and card checkout', 'Restaurant order dashboard'],
                'stack' => ['Laravel', 'Vue.js', 'M-Pesa Daraja'],
                'services' => ['web-application-development', 'api-integrations'],
                'image' => '/images/projects/omnifood.png',
            ],
            [
                'slug' => 'hotelia-hotel-management',
                'title' => 'Hotelia – Hotel Management System',
                'name' => 'Hotelia',
                'category' => 'Hospitality Management System',
                'industry' => 'Hospitality',
                'market' => 'Kenya',
                'platform' => 'Web',
                'summary' => 'A centralised hotel management platform for reservations, room availability, guests and reporting.',
                'challenge' => 'Front-desk teams were double-booking rooms because reservations were kept across spreadsheets and phone notes.',
                'solution' => 'Hotelia centralises reservations, room status, guest records and billing in one system with role-based access for each department.',
                'features' => ['Reservation calendar and room availability', 'Guest profiles and history', 'Billing and invoicing', 'Occupancy and revenue reports'],
                'stack' => ['Laravel', 'Vue.js', 'MySQL'],
                'services' => ['web-application-development', 'ui-ux-design'],
                'image' => '/images/projects/hotelia.png',
            ],
        ];
    }

    /**
     * @return CaseStudy|null
     */
    public function find(string $slug): ?array
    {
        return collect($this->all())->firstWhere('slug', $slug);
    }

    /**
     * @return list<CaseStudy>
     */
    public function forService(string $serviceSlug): array
    {
        return collect($this->all())
            ->filter(fn (array $caseStudy): bool => in_array($serviceSlug, $caseStudy['services'], true))
            ->values()
            ->all();
    }
}
