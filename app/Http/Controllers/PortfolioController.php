<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PortfolioController extends Controller
{
    public function index()
    {

        return Inertia::render('Portfolio/Index', [
            'og_image' => asset('/images/branding/og.png'),
            'portfolio' => [
                [
                    'id' => 1,
                    'title' => 'Propify – Real Estate Marketplace (Kenya)',
                    'description' => 'A comprehensive real estate web platform enabling property listings, lead management, and secure user interactions for agents, developers, and buyers.',
                    'category' => 'Web Platform',
                    'image_url' => asset('/images/projects/propify.png')
                ],
                [
                    'id' => 2,
                    'title' => 'Social Scheduler Pro',
                    'description' => 'An AI-powered social media scheduling and automation platform supporting multi-account publishing, team collaboration, and performance optimization.',
                    'category' => 'AI & Automation Platform',
                    'image_url' => asset('/images/projects/socialscheduler.png')
                ],
                [
                    'id' => 3,
                    'title' => 'Rezimi – AI Resume Builder',
                    'description' => 'A SaaS application that leverages AI to generate, optimize, and tailor professional resumes based on job descriptions and career goals.',
                    'category' => 'SaaS Application',
                    'image_url' => asset('/images/projects/rezimi.png')
                ],
                [
                    'id' => 4,
                    'title' => 'Farm Operations Automation System',
                    'description' => 'A digital farm management solution designed to automate operations, track activities, and improve productivity through data-driven insights.',
                    'category' => 'Automation System',
                    'image_url' => asset('/images/projects/mkulima.png')
                ],
                [
                    'id' => 5,
                    'title' => 'Omnifood – Food Delivery Platform',
                    'description' => 'A modern food delivery web application enabling online ordering, menu management, and seamless customer-to-restaurant interactions.',
                    'category' => 'E-commerce Application',
                    'image_url' => asset('/images/projects/omnifood.png')
                ],
                [
                    'id' => 6,
                    'title' => 'Hotelia – Hotel Management System',
                    'description' => 'A centralized hotel management platform for handling reservations, room availability, guest records, and operational reporting.',
                    'category' => 'Hospitality Management System',
                    'image_url' => asset('/images/projects/hotelia.png')
                ],
            ],
        ]);
    }
}
