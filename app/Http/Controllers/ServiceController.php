<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Services/Index', [
            'og_image' => asset('/images/branding/og.png'),
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
        ]);
    }
}
