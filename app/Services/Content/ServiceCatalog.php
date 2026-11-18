<?php

namespace App\Services\Content;

/**
 * The services Propify Solutions offers, with the copy used on service pages.
 *
 * @phpstan-type Service array{
 *     slug: string,
 *     title: string,
 *     short_title: string,
 *     icon: string,
 *     summary: string,
 *     description: string,
 *     keywords: list<string>,
 *     deliverables: list<string>,
 *     outcomes: list<array{title: string, body: string}>,
 *     stack: list<string>,
 *     faqs: list<array{question: string, answer: string}>
 * }
 */
class ServiceCatalog
{
    /**
     * @return list<Service>
     */
    public function all(): array
    {
        return [
            [
                'slug' => 'web-application-development',
                'title' => 'Custom Web Application Development',
                'short_title' => 'Web Applications',
                'icon' => 'code',
                'summary' => 'Secure, fast web applications built around how your business actually works.',
                'description' => 'We design and build custom web applications — customer portals, internal tools, marketplaces and dashboards — using Laravel, Vue, React and Next.js. Every build ships with automated tests, role-based access and a deployment pipeline, so your platform is ready for real users from day one.',
                'keywords' => ['web application development Kenya', 'custom software Nairobi', 'Laravel developers Kenya', 'web developers Nairobi'],
                'deliverables' => ['Product discovery & technical specification', 'UX wireframes and high-fidelity UI design', 'Responsive web application with admin panel', 'Automated test suite and CI/CD pipeline', 'Documentation and team handover'],
                'outcomes' => [
                    ['title' => 'Replace spreadsheets', 'body' => 'Move fragile manual processes into one system with audit trails and permissions.'],
                    ['title' => 'Serve customers online', 'body' => 'Self-service portals that cut support load and work on low-bandwidth mobile connections.'],
                    ['title' => 'Grow without rewrites', 'body' => 'A clean architecture that new developers can extend without starting over.'],
                ],
                'stack' => ['Laravel', 'Vue.js', 'React', 'Next.js', 'PostgreSQL', 'Tailwind CSS'],
                'faqs' => [
                    ['question' => 'How long does a custom web application take to build?', 'answer' => 'A focused first release usually takes 6–10 weeks. Larger platforms are delivered in fortnightly increments so you can use working software early.'],
                    ['question' => 'Will I own the source code?', 'answer' => 'Yes. You own all source code, designs and infrastructure accounts once the project is paid for.'],
                ],
            ],
            [
                'slug' => 'mobile-app-development',
                'title' => 'Mobile App Development',
                'short_title' => 'Mobile Apps',
                'icon' => 'smartphone',
                'summary' => 'Cross-platform iOS and Android apps that stay fast on everyday African networks.',
                'description' => 'We build iOS and Android apps with Flutter and React Native from a single codebase. Apps are designed for offline use, small download sizes and mobile money checkout, then published to the App Store and Google Play for you.',
                'keywords' => ['mobile app development Kenya', 'app developers Nairobi', 'Flutter developers Kenya', 'Android app development Nigeria'],
                'deliverables' => ['App UX and UI design', 'Flutter or React Native app for iOS and Android', 'Backend API and admin dashboard', 'Push notifications and analytics', 'App Store and Google Play publishing'],
                'outcomes' => [
                    ['title' => 'One codebase', 'body' => 'Ship to iOS and Android at the same time, at a lower cost than two native apps.'],
                    ['title' => 'Offline-first', 'body' => 'Data syncs when the network returns, so field teams and customers are never blocked.'],
                    ['title' => 'Mobile money built in', 'body' => 'M-Pesa, MTN MoMo and Airtel Money checkout that customers already trust.'],
                ],
                'stack' => ['Flutter', 'React Native', 'Firebase', 'Laravel', 'Node.js'],
                'faqs' => [
                    ['question' => 'Do you build native or cross-platform apps?', 'answer' => 'We default to Flutter or React Native for speed and cost, and use native Swift or Kotlin modules where a feature needs them.'],
                    ['question' => 'Can you publish the app to the stores for us?', 'answer' => 'Yes. We prepare store listings, handle review submissions and set up your developer accounts in your company name.'],
                ],
            ],
            [
                'slug' => 'saas-development',
                'title' => 'SaaS Platform Development',
                'short_title' => 'SaaS Platforms',
                'icon' => 'cloud',
                'summary' => 'Multi-tenant SaaS products with subscriptions, billing and role-based access.',
                'description' => 'From first MVP to a platform with thousands of tenants, we engineer SaaS products with multi-tenancy, subscription billing in local and international currencies, usage metering, team permissions and the observability needed to run them reliably.',
                'keywords' => ['SaaS development Africa', 'SaaS development company Kenya', 'MVP development Nairobi', 'startup software development Lagos'],
                'deliverables' => ['MVP scoping and roadmap', 'Multi-tenant architecture', 'Subscription billing (Stripe, Paystack, M-Pesa)', 'Team roles, invites and audit logs', 'Monitoring, backups and scaling plan'],
                'outcomes' => [
                    ['title' => 'Launch faster', 'body' => 'A proven SaaS foundation means your budget goes into the features that make you different.'],
                    ['title' => 'Charge in any currency', 'body' => 'Bill customers in KES, NGN, GHS, UGX, TZS or USD with recurring payments.'],
                    ['title' => 'Ready for investors', 'body' => 'Clean code, metrics and documentation that stand up to technical due diligence.'],
                ],
                'stack' => ['Laravel', 'Next.js', 'PostgreSQL', 'Redis', 'Stripe', 'Paystack'],
                'faqs' => [
                    ['question' => 'Can you take over an existing SaaS codebase?', 'answer' => 'Yes. We start with a code and infrastructure audit, fix critical risks first, then continue feature development.'],
                ],
            ],
            [
                'slug' => 'ai-automation',
                'title' => 'AI Integration & Business Automation',
                'short_title' => 'AI & Automation',
                'icon' => 'sparkles',
                'summary' => 'Practical AI features and workflow automation that save hours every week.',
                'description' => 'We add AI where it pays off: document processing, customer support assistants, content generation, smart search and agent workflows connected to your own data. We also automate repetitive operations — approvals, reconciliations, reports and notifications — across the tools you already use.',
                'keywords' => ['AI development company Kenya', 'business automation Nairobi', 'AI chatbot development Africa', 'workflow automation Nigeria'],
                'deliverables' => ['Automation opportunity audit', 'LLM-powered assistants and agents', 'Retrieval over your documents and data', 'Workflow automation and integrations', 'Evaluation, guardrails and cost monitoring'],
                'outcomes' => [
                    ['title' => 'Hours back each week', 'body' => 'Automate the repetitive work that keeps your team from customers.'],
                    ['title' => 'Answers from your data', 'body' => 'Assistants grounded in your policies, products and records — not generic chat.'],
                    ['title' => 'Controlled costs', 'body' => 'Usage monitoring and model choices that keep AI spend predictable.'],
                ],
                'stack' => ['Claude', 'OpenAI', 'Laravel', 'Python', 'PostgreSQL + pgvector'],
                'faqs' => [
                    ['question' => 'Is our data used to train AI models?', 'answer' => 'No. We use enterprise API terms that exclude your data from model training and keep sensitive data in your own infrastructure.'],
                ],
            ],
            [
                'slug' => 'api-integrations',
                'title' => 'API Development & Payment Integrations',
                'short_title' => 'APIs & Integrations',
                'icon' => 'plug',
                'summary' => 'M-Pesa, mobile money, banking and third-party integrations that just work.',
                'description' => 'We build secure REST and GraphQL APIs and connect your systems to the services African businesses rely on: M-Pesa Daraja, MTN MoMo, Airtel Money, Paystack, Flutterwave, Stripe, KRA eTIMS, Africa\'s Talking SMS, CRMs and ERPs.',
                'keywords' => ['M-Pesa integration Kenya', 'Daraja API developer', 'Paystack integration Nigeria', 'MTN MoMo API integration Ghana', 'API development Nairobi'],
                'deliverables' => ['API design and documentation', 'Payment gateway and mobile money integration', 'Webhook handling and reconciliation', 'SMS, USSD and WhatsApp messaging', 'Monitoring and failure alerts'],
                'outcomes' => [
                    ['title' => 'Get paid reliably', 'body' => 'Idempotent payment flows with automatic reconciliation and clear failure handling.'],
                    ['title' => 'Connected systems', 'body' => 'Stop re-typing data between your website, accounting and CRM.'],
                    ['title' => 'Compliance-ready', 'body' => 'Tax and invoicing integrations such as KRA eTIMS handled properly.'],
                ],
                'stack' => ['M-Pesa Daraja', 'MTN MoMo', 'Paystack', 'Flutterwave', 'Stripe', 'Africa\'s Talking'],
                'faqs' => [
                    ['question' => 'Can you integrate M-Pesa STK Push into our website?', 'answer' => 'Yes. We implement STK Push, C2B, B2C and transaction status checks, including the go-live process with Safaricom.'],
                ],
            ],
            [
                'slug' => 'ui-ux-design',
                'title' => 'UI/UX & Product Design',
                'short_title' => 'UI/UX Design',
                'icon' => 'pen-tool',
                'summary' => 'Research-led product design that turns visitors into customers.',
                'description' => 'Our designers map your users\' journeys, prototype quickly and test with real people before any code is written. You get a design system your developers can build from, accessible interfaces and flows tuned for conversion.',
                'keywords' => ['UI UX design Kenya', 'product design agency Nairobi', 'app design company Africa'],
                'deliverables' => ['User research and journey mapping', 'Wireframes and clickable prototypes', 'High-fidelity UI in Figma', 'Design system and component library', 'Usability testing'],
                'outcomes' => [
                    ['title' => 'Fewer drop-offs', 'body' => 'Simple flows that get users to value quickly.'],
                    ['title' => 'Faster builds', 'body' => 'A reusable design system removes guesswork for developers.'],
                    ['title' => 'Accessible by default', 'body' => 'Interfaces that meet WCAG 2.2 AA contrast and keyboard standards.'],
                ],
                'stack' => ['Figma', 'FigJam', 'Maze', 'Tailwind CSS'],
                'faqs' => [],
            ],
            [
                'slug' => 'cloud-devops',
                'title' => 'Cloud Infrastructure & DevOps',
                'short_title' => 'Cloud & DevOps',
                'icon' => 'server',
                'summary' => 'Reliable hosting, CI/CD and monitoring so releases are boring — in a good way.',
                'description' => 'We set up and manage cloud infrastructure on AWS, DigitalOcean and local African hosts, with automated deployments, backups, security hardening and monitoring. Cost reviews keep your cloud bill in check as you grow.',
                'keywords' => ['DevOps services Kenya', 'cloud hosting setup Nairobi', 'AWS consultants Kenya'],
                'deliverables' => ['Infrastructure as code', 'CI/CD pipelines', 'Backups and disaster recovery', 'Uptime, error and performance monitoring', 'Security hardening and cost reviews'],
                'outcomes' => [
                    ['title' => 'Ship daily', 'body' => 'Automated pipelines turn releases into a one-click, low-risk routine.'],
                    ['title' => 'Stay online', 'body' => 'Monitoring and alerts catch problems before customers do.'],
                    ['title' => 'Lower bills', 'body' => 'Right-sized servers and storage instead of paying for idle capacity.'],
                ],
                'stack' => ['AWS', 'DigitalOcean', 'Docker', 'GitHub Actions', 'Cloudflare', 'Laravel Forge'],
                'faqs' => [],
            ],
            [
                'slug' => 'maintenance-support',
                'title' => 'Software Maintenance & Support',
                'short_title' => 'Maintenance & Support',
                'icon' => 'shield',
                'summary' => 'Ongoing updates, security patches and improvements for the software you rely on.',
                'description' => 'We keep business-critical software healthy: dependency and framework upgrades, security patches, performance tuning, bug fixes and small improvements on a predictable monthly plan. We also rescue and stabilise systems built by other teams.',
                'keywords' => ['software maintenance Kenya', 'Laravel upgrade services', 'website support Nairobi'],
                'deliverables' => ['Monthly maintenance plan', 'Framework and dependency upgrades', 'Security monitoring and patching', 'Performance optimisation', 'Agreed response times'],
                'outcomes' => [
                    ['title' => 'Fewer surprises', 'body' => 'Problems are found and fixed during routine checks, not outages.'],
                    ['title' => 'Up-to-date and secure', 'body' => 'Supported framework versions and patched dependencies.'],
                    ['title' => 'One accountable team', 'body' => 'A single point of contact who knows your system.'],
                ],
                'stack' => ['Laravel', 'Vue.js', 'React', 'Sentry', 'GitHub'],
                'faqs' => [],
            ],
        ];
    }

    /**
     * @return Service|null
     */
    public function find(string $slug): ?array
    {
        return collect($this->all())->firstWhere('slug', $slug);
    }
}
