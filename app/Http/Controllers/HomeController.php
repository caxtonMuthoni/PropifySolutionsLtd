<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Index', [
            'services' => [
                [
                    'id' => 1,
                    'title' => 'Custom Web Application Development',
                    'description' => 'Design and development of secure, high-performance web applications tailored to specific business requirements.',
                    'icon' => 'code-bracket',
                ],
                [
                    'id' => 2,
                    'title' => 'Backend Systems & API Development',
                    'description' => 'Robust backend architecture and RESTful or GraphQL APIs designed for scalability, security, and maintainability.',
                    'icon' => 'server-stack',
                ],
                [
                    'id' => 3,
                    'title' => 'SaaS Platform Engineering',
                    'description' => 'End-to-end development of scalable SaaS platforms including multi-tenancy, subscriptions, and role-based access control.',
                    'icon' => 'cloud',
                ],
                [
                    'id' => 4,
                    'title' => 'System Integration & Third-Party APIs',
                    'description' => 'Seamless integration with payment gateways, CRM systems, mapping services, and other third-party platforms.',
                    'icon' => 'arrows-right-left',
                ],
                [
                    'id' => 5,
                    'title' => 'Database Design & Optimization',
                    'description' => 'Efficient database architecture, query optimization, and data modeling to ensure performance and data integrity.',
                    'icon' => 'circle-stack',
                ],
                [
                    'id' => 6,
                    'title' => 'Authentication & Access Control',
                    'description' => 'Implementation of secure authentication systems including OAuth, JWT, and role-based access management.',
                    'icon' => 'lock-closed',
                ],
                [
                    'id' => 7,
                    'title' => 'Cloud Deployment & DevOps',
                    'description' => 'Automated deployments, CI/CD pipelines, and cloud infrastructure setup for reliable and scalable applications.',
                    'icon' => 'rocket-launch',
                ],
                [
                    'id' => 8,
                    'title' => 'Application Maintenance & Performance Monitoring',
                    'description' => 'Ongoing system maintenance, performance tuning, monitoring, and security updates to ensure long-term stability.',
                    'icon' => 'chart-bar',
                ],
            ],

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

            'testimonials' => [
                [
                    'id' => 1,
                    'name' => 'James Mwangi',
                    'company' => 'Savanna Property Group',
                    'content' => 'Propify Solutions Ltd delivered a reliable and well-structured platform that aligned perfectly with our business requirements. Their team demonstrated strong technical expertise and professionalism throughout the project.',
                    'rating' => 5,
                ],
                [
                    'id' => 2,
                    'name' => 'Amina Hassan',
                    'company' => 'Coastal Developments Ltd',
                    'content' => 'Working with Propify Solutions Ltd was a smooth and transparent experience. Communication was clear, timelines were met, and the final solution exceeded our expectations.',
                    'rating' => 5,
                ],
                [
                    'id' => 3,
                    'name' => 'Peter Otieno',
                    'company' => 'Lakeview Realtors',
                    'content' => 'The Propify Solutions Ltd team showed a deep understanding of our operational needs and delivered a scalable solution that has significantly improved our workflow.',
                    'rating' => 5,
                ],
                [
                    'id' => 4,
                    'name' => 'Sarah Johnson',
                    'company' => 'TechStart Inc.',
                    'content' => 'Propify Solutions Ltd provided a high-quality solution with a strong focus on performance and reliability. We would confidently recommend their services.',
                    'rating' => 5,
                ],
            ]


        ]);
    }

    public function about()
    {
        return Inertia::render('About/Index');
    }

    public function contact()
    {
        return Inertia::render('Contact/Index');
    }
}
