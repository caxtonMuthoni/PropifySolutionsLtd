<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Company Identity
    |--------------------------------------------------------------------------
    |
    | Canonical business details used across pages, structured data, the
    | sitemap and the machine-readable files served to AI agents.
    |
    */

    'name' => 'Propify Solutions',
    'legal_name' => 'Propify Solutions Ltd',
    'tagline' => 'Software development company in Nairobi, Kenya',
    'description' => 'Propify Solutions is a Nairobi-based software development company that designs, builds and scales web applications, mobile apps, SaaS platforms and AI automation for businesses in Kenya, Uganda, Tanzania, Nigeria and Ghana.',
    'site_url' => rtrim(env('SITE_URL', 'https://solutions.propify.co.ke'), '/'),
    'founded' => 2020,

    'contact' => [
        'email' => 'hello@propify.co.ke',
        'careers_email' => 'hello@propify.co.ke',
        'phone' => '+254743751575',
        'phone_display' => '+254 743 751 575',
        'whatsapp' => 'https://wa.me/254743751575',
    ],

    'address' => [
        'locality' => 'Nairobi',
        'region' => 'Nairobi County',
        'country' => 'KE',
        'country_name' => 'Kenya',
        'latitude' => -1.2864,
        'longitude' => 36.8172,
    ],

    'opening_hours' => [
        ['days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'], 'opens' => '09:00', 'closes' => '18:00', 'label' => 'Monday – Friday', 'display' => '9:00 AM – 6:00 PM'],
        ['days' => ['Saturday'], 'opens' => '10:00', 'closes' => '14:00', 'label' => 'Saturday', 'display' => '10:00 AM – 2:00 PM'],
    ],

    /*
    | Leave a URL empty to hide that network from the footer and schema.
    */
    'social' => [
        'linkedin' => env('SOCIAL_LINKEDIN', ''),
        'github' => env('SOCIAL_GITHUB', ''),
        'x' => env('SOCIAL_X', ''),
        'facebook' => env('SOCIAL_FACEBOOK', ''),
    ],

    'stats' => [
        ['value' => '150+', 'label' => 'Projects delivered'],
        ['value' => '40+', 'label' => 'Clients served'],
        ['value' => '98%', 'label' => 'Client satisfaction'],
        ['value' => '5', 'label' => 'African markets'],
    ],

    'markets' => ['Kenya', 'Uganda', 'Tanzania', 'Nigeria', 'Ghana'],

    /*
    |--------------------------------------------------------------------------
    | Leadership & Team
    |--------------------------------------------------------------------------
    |
    | Shown on the About page. Names in [brackets] are placeholders: they are
    | displayed but left out of structured data until replaced. Photos are
    | paths under public/; a missing file falls back to initials.
    |
    */

    'team' => [
        'ceo' => [
            'name' => 'Caxton Muthoni',
            'role' => 'Founder & CEO',
            'photo' => '/images/team/ceo.jpg',
            'linkedin' => '',
            'message' => [
                'We started Propify Solutions because African businesses deserve software built for how they actually work — mobile money, patchy networks, local regulation and all.',
                'Every project we take on gets the same promise: honest advice, transparent progress and code we would be proud to maintain ourselves. When you work with us, you work directly with the people building your product.',
            ],
        ],
        'group_photo' => '/images/team/team.jpg',
        'group_caption' => 'The Propify Solutions team in Nairobi.',
    ],

];
