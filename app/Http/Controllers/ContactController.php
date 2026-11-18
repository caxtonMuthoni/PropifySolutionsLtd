<?php

namespace App\Http\Controllers;

use App\Services\SeoService;
use Illuminate\Contracts\View\View;

class ContactController extends Controller
{
    public function index(SeoService $seo): View
    {
        $agency = config('agency');

        return view('site.contact', [
            'seo' => $seo->page(
                title: 'Contact Us – Get a Free Software Project Quote',
                description: 'Talk to a Nairobi software development team. Book a free 30-minute consultation or request a quote for your web, mobile, SaaS or AI project. Call '.$agency['contact']['phone_display'].'.',
                path: '/contact',
                keywords: ['contact software company Nairobi', 'software development quote Kenya', 'hire developers Kenya'],
                breadcrumbs: [['name' => 'Contact', 'path' => '/contact']],
            ),
            'contactInfo' => [
                'email' => $agency['contact']['email'],
                'phone' => $agency['contact']['phone'],
                'phoneDisplay' => $agency['contact']['phone_display'],
                'whatsapp' => $agency['contact']['whatsapp'],
                'officeHours' => $agency['opening_hours'],
                'address' => "{$agency['address']['locality']}, {$agency['address']['country_name']}",
            ],
        ]);
    }
}
