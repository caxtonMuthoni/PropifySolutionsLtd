<?php

namespace App\Services\Content;

/**
 * Markets served, each with a dedicated landing page for local search.
 *
 * @phpstan-type Location array{
 *     slug: string,
 *     city: string,
 *     country: string,
 *     country_code: string,
 *     region_code: string,
 *     latitude: float,
 *     longitude: float,
 *     timezone: string,
 *     is_headquarters: bool,
 *     headline: string,
 *     intro: string,
 *     payments: list<string>,
 *     compliance: list<array{title: string, body: string}>,
 *     industries: list<string>,
 *     cities: list<string>,
 *     faqs: list<array{question: string, answer: string}>
 * }
 */
class LocationCatalog
{
    /**
     * @return list<Location>
     */
    public function all(): array
    {
        return [
            [
                'slug' => 'nairobi-kenya',
                'city' => 'Nairobi',
                'country' => 'Kenya',
                'country_code' => 'KE',
                'region_code' => 'KE-30',
                'latitude' => -1.2864,
                'longitude' => 36.8172,
                'timezone' => 'EAT (UTC+3)',
                'is_headquarters' => true,
                'headline' => 'Software Development Company in Nairobi, Kenya',
                'intro' => 'Propify Solutions is headquartered in Nairobi. We build custom software, mobile apps and SaaS platforms for Kenyan startups, SMEs, NGOs and enterprises — with M-Pesa, KRA eTIMS and Data Protection Act compliance built in from the start.',
                'payments' => ['M-Pesa Daraja (STK Push, C2B, B2C)', 'Airtel Money', 'Pesapal', 'Card payments via Stripe & Paystack', 'Bank APIs'],
                'compliance' => [
                    ['title' => 'Data Protection Act, 2019', 'body' => 'Consent flows, data minimisation and breach procedures aligned with ODPC requirements.'],
                    ['title' => 'KRA eTIMS', 'body' => 'Electronic tax invoice integration for systems that issue invoices.'],
                ],
                'industries' => ['Real estate', 'Fintech & SACCOs', 'Agritech', 'Logistics', 'Hospitality', 'NGOs'],
                'cities' => ['Nairobi', 'Mombasa', 'Kisumu', 'Nakuru', 'Eldoret', 'Thika'],
                'faqs' => [
                    ['question' => 'Where is Propify Solutions located?', 'answer' => 'Our team is based in Nairobi, Kenya. We meet clients in person in Nairobi and work remotely with clients across Kenya and Africa.'],
                    ['question' => 'Can you integrate M-Pesa into my system?', 'answer' => 'Yes. We regularly implement M-Pesa Daraja APIs, including STK Push, paybill and till payments, B2C disbursements and automatic reconciliation.'],
                    ['question' => 'Do you invoice in Kenyan shillings?', 'answer' => 'Yes. Kenyan clients can be invoiced in KES and pay by M-Pesa or bank transfer.'],
                ],
            ],
            [
                'slug' => 'kampala-uganda',
                'city' => 'Kampala',
                'country' => 'Uganda',
                'country_code' => 'UG',
                'region_code' => 'UG-C',
                'latitude' => 0.3476,
                'longitude' => 32.5825,
                'timezone' => 'EAT (UTC+3)',
                'is_headquarters' => false,
                'headline' => 'Software Development Company Serving Kampala, Uganda',
                'intro' => 'We partner with Ugandan businesses to build web platforms, mobile apps and automation — working in the same time zone from Nairobi, with MTN MoMo and Airtel Money payments integrated as standard.',
                'payments' => ['MTN Mobile Money (MoMo API)', 'Airtel Money', 'Flutterwave', 'Card payments'],
                'compliance' => [
                    ['title' => 'Data Protection and Privacy Act, 2019', 'body' => 'Privacy-by-design practices aligned with the Act and PDPO registration requirements.'],
                ],
                'industries' => ['Fintech & SACCOs', 'Agritech', 'Education', 'NGOs', 'Retail'],
                'cities' => ['Kampala', 'Entebbe', 'Jinja', 'Mbarara', 'Gulu'],
                'faqs' => [
                    ['question' => 'Do you work with clients in Uganda?', 'answer' => 'Yes. We work with Ugandan clients remotely in the same EAT time zone and travel to Kampala for key workshops when needed.'],
                    ['question' => 'Can you integrate MTN MoMo payments?', 'answer' => 'Yes. We integrate MTN MoMo collections and disbursements as well as Airtel Money.'],
                ],
            ],
            [
                'slug' => 'dar-es-salaam-tanzania',
                'city' => 'Dar es Salaam',
                'country' => 'Tanzania',
                'country_code' => 'TZ',
                'region_code' => 'TZ-02',
                'latitude' => -6.7924,
                'longitude' => 39.2083,
                'timezone' => 'EAT (UTC+3)',
                'is_headquarters' => false,
                'headline' => 'Software Development Company Serving Dar es Salaam, Tanzania',
                'intro' => 'From Dar es Salaam to Arusha, we help Tanzanian organisations launch reliable software — bilingual English and Swahili interfaces, mobile money payments and infrastructure designed for local connectivity.',
                'payments' => ['Vodacom M-Pesa', 'Mixx by Yas', 'Airtel Money', 'Selcom', 'Card payments'],
                'compliance' => [
                    ['title' => 'Personal Data Protection Act, 2022', 'body' => 'Data handling, consent and cross-border transfer practices aligned with the PDPC framework.'],
                    ['title' => 'TRA electronic fiscal requirements', 'body' => 'Receipting integrations for systems that need TRA-compliant fiscal records.'],
                ],
                'industries' => ['Logistics', 'Tourism & hospitality', 'Agritech', 'Retail', 'NGOs'],
                'cities' => ['Dar es Salaam', 'Arusha', 'Dodoma', 'Mwanza', 'Zanzibar'],
                'faqs' => [
                    ['question' => 'Can you build Swahili-language apps?', 'answer' => 'Yes. Our team builds bilingual English and Swahili interfaces, with translations reviewed by native speakers.'],
                    ['question' => 'Do you integrate Tanzanian mobile money?', 'answer' => 'Yes. We integrate Vodacom M-Pesa, Mixx by Yas, Airtel Money and aggregators such as Selcom.'],
                ],
            ],
            [
                'slug' => 'lagos-nigeria',
                'city' => 'Lagos',
                'country' => 'Nigeria',
                'country_code' => 'NG',
                'region_code' => 'NG-LA',
                'latitude' => 6.5244,
                'longitude' => 3.3792,
                'timezone' => 'WAT (UTC+1)',
                'is_headquarters' => false,
                'headline' => 'Software Development Company Serving Lagos, Nigeria',
                'intro' => 'We work with Nigerian startups and enterprises to design, build and scale fintech, commerce and SaaS products — with Paystack and Flutterwave integrations, NDPA-aligned data practices and overlap with West Africa Time working hours.',
                'payments' => ['Paystack', 'Flutterwave', 'Monnify', 'Bank transfers & virtual accounts', 'Card payments'],
                'compliance' => [
                    ['title' => 'Nigeria Data Protection Act, 2023', 'body' => 'Lawful basis, consent and data subject rights handled in line with the NDPA and NDPC guidance.'],
                ],
                'industries' => ['Fintech', 'E-commerce', 'Logistics', 'Health tech', 'Education'],
                'cities' => ['Lagos', 'Abuja', 'Port Harcourt', 'Ibadan', 'Kano'],
                'faqs' => [
                    ['question' => 'Do you work with startups in Lagos?', 'answer' => 'Yes. We build MVPs and scale existing products for Nigerian startups, with daily overlap across EAT and WAT working hours.'],
                    ['question' => 'Can you integrate Paystack or Flutterwave?', 'answer' => 'Yes. We implement one-time and recurring payments, transfers, virtual accounts and webhook reconciliation.'],
                ],
            ],
            [
                'slug' => 'accra-ghana',
                'city' => 'Accra',
                'country' => 'Ghana',
                'country_code' => 'GH',
                'region_code' => 'GH-AA',
                'latitude' => 5.6037,
                'longitude' => -0.187,
                'timezone' => 'GMT (UTC+0)',
                'is_headquarters' => false,
                'headline' => 'Software Development Company Serving Accra, Ghana',
                'intro' => 'We help Ghanaian businesses go digital with custom web platforms, mobile apps and automation — integrated with MTN MoMo, Telecel Cash and Paystack, and built to scale across West Africa.',
                'payments' => ['MTN Mobile Money', 'Telecel Cash', 'AirtelTigo Money', 'Paystack', 'Hubtel'],
                'compliance' => [
                    ['title' => 'Data Protection Act, 2012 (Act 843)', 'body' => 'Data handling practices aligned with Act 843 and Data Protection Commission registration.'],
                ],
                'industries' => ['Fintech', 'Retail & e-commerce', 'Education', 'Real estate', 'Agritech'],
                'cities' => ['Accra', 'Kumasi', 'Tema', 'Takoradi', 'Tamale'],
                'faqs' => [
                    ['question' => 'Do you take projects from Ghana?', 'answer' => 'Yes. We work remotely with Ghanaian clients and schedule calls within GMT business hours.'],
                    ['question' => 'Can you integrate MTN MoMo in Ghana?', 'answer' => 'Yes. We integrate MTN MoMo, Telecel Cash and AirtelTigo Money directly or through Paystack and Hubtel.'],
                ],
            ],
        ];
    }

    /**
     * @return Location|null
     */
    public function find(string $slug): ?array
    {
        return collect($this->all())->firstWhere('slug', $slug);
    }
}
