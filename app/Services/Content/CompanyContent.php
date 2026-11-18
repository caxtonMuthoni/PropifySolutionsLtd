<?php

namespace App\Services\Content;

/**
 * Company-level copy shared by several pages and the agent-facing exports.
 */
class CompanyContent
{
    /**
     * @return list<array{step: string, title: string, summary: string, activities: list<string>, deliverable: string}>
     */
    public function processSteps(): array
    {
        return [
            ['step' => '01', 'title' => 'Discovery', 'summary' => 'We learn your business, users and goals, then agree the smallest release that delivers real value.', 'activities' => ['Stakeholder workshop', 'User and competitor research', 'Feature prioritisation', 'Technical feasibility check'], 'deliverable' => 'Scope, roadmap and fixed quote'],
            ['step' => '02', 'title' => 'Design', 'summary' => 'Wireframes become a clickable prototype that you test before a single line of code is written.', 'activities' => ['User flows and wireframes', 'High-fidelity UI', 'Clickable prototype', 'Design system'], 'deliverable' => 'Approved prototype'],
            ['step' => '03', 'title' => 'Build', 'summary' => 'Engineers ship working software every two weeks, with a live demo and staging link at the end of each sprint.', 'activities' => ['Fortnightly sprints', 'Code review on every change', 'Automated testing', 'Staging environment'], 'deliverable' => 'Working software every sprint'],
            ['step' => '04', 'title' => 'Test & Launch', 'summary' => 'We run QA, security and performance checks, migrate data and launch with monitoring switched on.', 'activities' => ['QA and user acceptance testing', 'Security and performance review', 'App store submission', 'Production deployment'], 'deliverable' => 'Live product'],
            ['step' => '05', 'title' => 'Support & Grow', 'summary' => 'After launch we fix, monitor and improve — and help you plan the next release based on real usage.', 'activities' => ['Free post-launch support', 'Uptime and error monitoring', 'Analytics review', 'Roadmap planning'], 'deliverable' => 'A product that keeps improving'],
        ];
    }

    /**
     * @return list<array{title: string, body: string, icon: string}>
     */
    public function values(): array
    {
        return [
            ['title' => 'Outcomes over output', 'body' => 'We measure success by the results your software produces, not the number of features shipped.', 'icon' => 'target'],
            ['title' => 'Radical transparency', 'body' => 'Fixed quotes, open project boards and honest advice — even when the answer is "you don\'t need this yet".', 'icon' => 'eye'],
            ['title' => 'Built for Africa', 'body' => 'Mobile money, low-bandwidth networks and local regulation are defaults, not afterthoughts.', 'icon' => 'globe'],
            ['title' => 'Craft that lasts', 'body' => 'Tested, documented code that your future team will thank you for.', 'icon' => 'gem'],
        ];
    }

    /**
     * @return list<array{name: string, category: string, color: string}>
     */
    public function techStack(): array
    {
        return [
            ['name' => 'Laravel', 'category' => 'Backend', 'color' => 'from-rose-500 to-red-600'],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'color' => 'from-emerald-400 to-teal-600'],
            ['name' => 'React', 'category' => 'Frontend', 'color' => 'from-sky-400 to-cyan-500'],
            ['name' => 'Next.js', 'category' => 'Frontend', 'color' => 'from-slate-700 to-slate-900'],
            ['name' => 'Flutter', 'category' => 'Mobile', 'color' => 'from-sky-400 to-blue-600'],
            ['name' => 'Node.js', 'category' => 'Backend', 'color' => 'from-lime-500 to-green-600'],
            ['name' => 'PostgreSQL', 'category' => 'Database', 'color' => 'from-blue-500 to-indigo-700'],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'color' => 'from-cyan-400 to-sky-500'],
            ['name' => 'Docker', 'category' => 'DevOps', 'color' => 'from-blue-400 to-blue-600'],
            ['name' => 'AWS', 'category' => 'Cloud', 'color' => 'from-amber-400 to-orange-500'],
            ['name' => 'DigitalOcean', 'category' => 'Cloud', 'color' => 'from-blue-500 to-sky-600'],
            ['name' => 'Claude & OpenAI', 'category' => 'AI', 'color' => 'from-orange-400 to-amber-600'],
        ];
    }

    /**
     * @return list<array{name: string, company: string, content: string}>
     */
    public function testimonials(): array
    {
        return [
            ['name' => 'James Mwangi', 'company' => 'Savanna Property Group', 'content' => 'Propify Solutions delivered a reliable and well-structured platform that aligned perfectly with our business requirements. Their team demonstrated strong technical expertise and professionalism throughout the project.'],
            ['name' => 'Amina Hassan', 'company' => 'Coastal Developments Ltd', 'content' => 'Working with Propify Solutions was a smooth and transparent experience. Communication was clear, timelines were met, and the final solution exceeded our expectations.'],
            ['name' => 'Peter Otieno', 'company' => 'Lakeview Realtors', 'content' => 'The Propify Solutions team showed a deep understanding of our operational needs and delivered a scalable solution that has significantly improved our workflow.'],
            ['name' => 'Sarah Johnson', 'company' => 'TechStart Inc.', 'content' => 'Propify Solutions provided a high-quality solution with a strong focus on performance and reliability. We would confidently recommend their services.'],
        ];
    }

    /**
     * @return list<array{title: string, type: string, summary: string}>
     */
    public function careerTracks(): array
    {
        return [
            ['title' => 'Full-stack Engineer (Laravel / Vue)', 'type' => 'Full-time · Nairobi / Hybrid', 'summary' => 'Build and ship product features end-to-end across our client projects.'],
            ['title' => 'Mobile Engineer (Flutter)', 'type' => 'Full-time · Remote (Africa)', 'summary' => 'Craft fast, offline-friendly mobile apps used across East and West Africa.'],
            ['title' => 'Product Designer', 'type' => 'Contract · Remote (Africa)', 'summary' => 'Turn research into clear flows, prototypes and design systems.'],
            ['title' => 'Engineering Intern', 'type' => 'Internship · Nairobi', 'summary' => 'Learn modern software delivery alongside senior engineers on real projects.'],
        ];
    }

    /**
     * @return list<array{title: string, body: string}>
     */
    public function careerPerks(): array
    {
        return [
            ['title' => 'Remote-friendly', 'body' => 'Work from our Nairobi hub or remotely from anywhere in Africa.'],
            ['title' => 'Learning budget', 'body' => 'Courses, certifications and conference tickets every year.'],
            ['title' => 'Real ownership', 'body' => 'Small teams, real responsibility and work that ships to users.'],
            ['title' => 'Modern tooling', 'body' => 'AI-assisted development, good hardware and a clean codebase.'],
        ];
    }
}
