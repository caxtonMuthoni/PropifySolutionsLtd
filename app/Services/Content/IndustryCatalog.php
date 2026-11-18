<?php

namespace App\Services\Content;

/**
 * Industries Propify Solutions builds software for.
 *
 * @phpstan-type Industry array{
 *     slug: string,
 *     title: string,
 *     icon: string,
 *     summary: string,
 *     description: string,
 *     solutions: list<string>,
 *     services: list<string>
 * }
 */
class IndustryCatalog
{
    /**
     * @return list<Industry>
     */
    public function all(): array
    {
        return [
            [
                'slug' => 'fintech',
                'title' => 'Fintech & Financial Services',
                'icon' => 'wallet',
                'summary' => 'Lending, savings, SACCO and payment platforms with mobile money at the core.',
                'description' => 'We build secure financial software for lenders, SACCOs, microfinance institutions and payment startups — with mobile money rails, KYC flows, audit trails and the reporting regulators expect.',
                'solutions' => ['Digital lending and loan management', 'SACCO and chama management systems', 'Wallets and mobile money collections', 'KYC and onboarding flows', 'Reconciliation and regulatory reporting'],
                'services' => ['web-application-development', 'api-integrations', 'mobile-app-development'],
            ],
            [
                'slug' => 'real-estate',
                'title' => 'Real Estate & PropTech',
                'icon' => 'building',
                'summary' => 'Listing marketplaces, rent collection and property management software.',
                'description' => 'Our roots are in property technology. We build listing portals, tenant and landlord apps, rent collection with M-Pesa and complete property management systems.',
                'solutions' => ['Property listing marketplaces', 'Rent collection and tenant portals', 'Property and facility management', 'CRM and lead management for agents'],
                'services' => ['web-application-development', 'api-integrations', 'ui-ux-design'],
            ],
            [
                'slug' => 'agriculture',
                'title' => 'Agriculture & Agritech',
                'icon' => 'sprout',
                'summary' => 'Farm management, produce traceability and farmer payment systems.',
                'description' => 'We build offline-capable tools for farms, cooperatives and agribusinesses — from field data capture to farmer payments and buyer marketplaces.',
                'solutions' => ['Farm and cooperative management', 'Produce traceability', 'Farmer registration and payments', 'Input and inventory tracking'],
                'services' => ['web-application-development', 'mobile-app-development', 'ai-automation'],
            ],
            [
                'slug' => 'logistics',
                'title' => 'Logistics & Transport',
                'icon' => 'truck',
                'summary' => 'Delivery tracking, fleet management and dispatch platforms.',
                'description' => 'We help logistics companies coordinate drivers, track deliveries and give customers real-time visibility, with integrations into payments and SMS notifications.',
                'solutions' => ['Delivery and courier platforms', 'Fleet and driver management', 'Route and dispatch tools', 'Proof-of-delivery apps'],
                'services' => ['mobile-app-development', 'web-application-development', 'api-integrations'],
            ],
            [
                'slug' => 'hospitality',
                'title' => 'Hospitality & Tourism',
                'icon' => 'hotel',
                'summary' => 'Hotel management, booking engines and restaurant ordering systems.',
                'description' => 'From boutique hotels to safari operators and restaurants, we build booking engines, property management systems and ordering platforms that reduce commissions and admin.',
                'solutions' => ['Hotel and property management', 'Direct booking engines', 'Restaurant ordering and delivery', 'Tour and safari booking'],
                'services' => ['web-application-development', 'api-integrations', 'ui-ux-design'],
            ],
            [
                'slug' => 'education',
                'title' => 'Education & EdTech',
                'icon' => 'graduation-cap',
                'summary' => 'School management, e-learning and fee payment platforms.',
                'description' => 'We build school management systems, learning platforms and fee collection tools used by schools, colleges and training providers.',
                'solutions' => ['School management systems', 'Learning management platforms', 'Fee collection with mobile money', 'Parent and student portals'],
                'services' => ['web-application-development', 'mobile-app-development', 'saas-development'],
            ],
            [
                'slug' => 'healthcare',
                'title' => 'Healthcare & HealthTech',
                'icon' => 'heart-pulse',
                'summary' => 'Clinic management, telemedicine and patient engagement tools.',
                'description' => 'We build privacy-conscious healthcare software — clinic and pharmacy management, appointment booking and telemedicine — with strict access controls for sensitive health data.',
                'solutions' => ['Clinic and pharmacy management', 'Appointment booking and reminders', 'Telemedicine', 'Patient records with audit logs'],
                'services' => ['web-application-development', 'mobile-app-development', 'ui-ux-design'],
            ],
            [
                'slug' => 'ecommerce',
                'title' => 'Retail & E-commerce',
                'icon' => 'shopping-bag',
                'summary' => 'Online stores, marketplaces and inventory systems that sell more.',
                'description' => 'We build online stores and marketplaces with mobile money checkout, delivery integrations and inventory management connected to your physical shops.',
                'solutions' => ['Custom online stores', 'Multi-vendor marketplaces', 'Inventory and POS integration', 'Delivery and order tracking'],
                'services' => ['web-application-development', 'api-integrations', 'mobile-app-development'],
            ],
        ];
    }

    /**
     * @return Industry|null
     */
    public function find(string $slug): ?array
    {
        return collect($this->all())->firstWhere('slug', $slug);
    }
}
