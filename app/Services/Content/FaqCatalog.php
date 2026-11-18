<?php

namespace App\Services\Content;

/**
 * General frequently asked questions.
 */
class FaqCatalog
{
    /**
     * @return list<array{category: string, question: string, answer: string}>
     */
    public function all(): array
    {
        return [
            ['category' => 'Working with us', 'question' => 'How do you deliver projects so quickly?', 'answer' => 'We start from battle-tested foundations for authentication, payments, admin panels and deployment, and use AI-assisted tooling for repetitive work. That lets our engineers spend their time on the business logic that makes your product unique.'],
            ['category' => 'Working with us', 'question' => 'What if my project is complex?', 'answer' => 'Complex projects are split into phases. We prioritise the features needed for launch, design the architecture for scale from day one, and deliver working software every two weeks so you can steer as we go.'],
            ['category' => 'Working with us', 'question' => 'Can you integrate with our existing systems?', 'answer' => 'Yes. We regularly integrate with M-Pesa, MTN MoMo, Paystack, Flutterwave, Stripe, KRA eTIMS, ERPs, CRMs and legacy databases, and we document every integration we build.'],
            ['category' => 'Working with us', 'question' => 'Which countries do you work in?', 'answer' => 'We are based in Nairobi, Kenya, and work with clients across Kenya, Uganda, Tanzania, Nigeria and Ghana, as well as international clients in Europe and North America.'],
            ['category' => 'Working with us', 'question' => 'How do we communicate during the project?', 'answer' => 'You get a dedicated project lead, a shared Slack or WhatsApp channel, a live project board and a demo of working software every two weeks.'],
            ['category' => 'Pricing & payment', 'question' => 'How much does a project cost?', 'answer' => 'Every project is quoted individually. After a free discovery call we send a written, fixed quote based on scope, integrations and timeline — so you know the full cost before any work starts.'],
            ['category' => 'Pricing & payment', 'question' => 'Which payment methods do you accept?', 'answer' => 'We accept M-Pesa, bank transfer, card payments and international wire transfers. Projects are paid in milestones, so you only pay for work that has been delivered.'],
            ['category' => 'Pricing & payment', 'question' => 'Are there any hidden costs?', 'answer' => 'No. Quotes list every deliverable, and third-party costs such as hosting, app store fees or paid APIs are shown separately and billed at cost.'],
            ['category' => 'Ownership & support', 'question' => 'Who owns the code?', 'answer' => 'You do. All source code, designs, domains and cloud accounts are transferred to you, and we work in repositories you control.'],
            ['category' => 'Ownership & support', 'question' => 'Do you offer support after launch?', 'answer' => 'Yes. Every project includes a free support period, after which you can choose a monthly maintenance plan for updates, security patches and improvements.'],
            ['category' => 'Ownership & support', 'question' => 'Will you sign an NDA?', 'answer' => 'Yes. We are happy to sign a non-disclosure agreement before you share any confidential details.'],
        ];
    }

    /**
     * @return list<array{category: string, question: string, answer: string}>
     */
    public function featured(int $limit = 6): array
    {
        return array_slice($this->all(), 0, $limit);
    }
}
