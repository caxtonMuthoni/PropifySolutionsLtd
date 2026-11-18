<?php

namespace App\Services\Content;

use Illuminate\Support\Str;

/**
 * Long-form insight articles. Bodies are written in Markdown.
 *
 * @phpstan-type Article array{
 *     slug: string,
 *     title: string,
 *     excerpt: string,
 *     category: string,
 *     published_at: string,
 *     updated_at: string,
 *     reading_minutes: int,
 *     keywords: list<string>,
 *     body: string
 * }
 */
class ArticleCatalog
{
    /**
     * @return list<Article>
     */
    public function all(): array
    {
        return collect($this->articles())
            ->map(fn (array $article): array => [
                ...$article,
                'reading_minutes' => max(1, (int) ceil(str_word_count($article['body']) / 220)),
            ])
            ->sortByDesc('published_at')
            ->values()
            ->all();
    }

    /**
     * @return Article|null
     */
    public function find(string $slug): ?array
    {
        return collect($this->all())->firstWhere('slug', $slug);
    }

    public function html(string $markdown): string
    {
        return Str::markdown($markdown, [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
    }

    /**
     * @return list<array{slug: string, title: string, excerpt: string, category: string, published_at: string, updated_at: string, keywords: list<string>, body: string}>
     */
    private function articles(): array
    {
        return [
            [
                'slug' => 'cost-to-build-an-app-in-kenya',
                'title' => 'How Much Does It Cost to Build an App in Kenya? (2026 Guide)',
                'excerpt' => 'A practical breakdown of what drives software development costs in Kenya and East Africa, and how to get an accurate quote for your website, MVP or SaaS platform.',
                'category' => 'Pricing',
                'published_at' => '2026-11-10',
                'updated_at' => '2026-11-10',
                'keywords' => ['cost to build an app in Kenya', 'app development cost Nairobi', 'software development pricing Africa'],
                'body' => <<<'MD'
"How much will it cost?" is the first question almost every founder and business owner asks us. The honest answer is *it depends* — but it depends on a small number of predictable factors. This guide explains those factors and gives the budget ranges we quote at Propify Solutions in Nairobi.

## The five factors that drive cost

1. **Scope** — the number of screens, user roles and workflows. A booking app with one user type is far cheaper than a marketplace with buyers, sellers and administrators.
2. **Integrations** — every external system (M-Pesa, banks, KRA eTIMS, SMS gateways, ERPs) adds design, testing and go-live work.
3. **Platforms** — a web app, an Android app and an iOS app are three surfaces. Cross-platform tools such as Flutter reduce, but do not remove, that cost.
4. **Design depth** — a polished, tested design system costs more upfront and saves money during development.
5. **Quality bar** — automated tests, security reviews and monitoring add effort but prevent expensive failures after launch.

## How we quote

We don't publish fixed price lists, because two apps with the same number of screens can differ greatly in integrations and risk. Instead, every project starts with a free discovery call. Within a few working days we send a written quote that lists each deliverable, the timeline and any third-party costs — so you can compare options with confidence.

## How to spend less without cutting corners

- **Launch with less.** Pick the one workflow that proves your idea and ship it first.
- **Use proven building blocks.** Authentication, payments and admin panels should not be built from scratch.
- **Decide on payments early.** Mobile money integrations need sandbox testing and approval from providers, so start them in week one.
- **Budget for after launch.** Plan roughly 15–20% of the build cost per year for hosting, maintenance and improvements.

## Fixed price or time and materials?

Fixed-price quotes suit well-defined projects such as websites and small MVPs. For products that will evolve with user feedback, a monthly team gives you flexibility to change priorities without renegotiating a contract. Many of our clients start fixed-price and switch to a monthly team after launch.

## Next step

Book a free 30-minute call and we will turn your idea into a scoped estimate within a few working days.
MD,
            ],
            [
                'slug' => 'mpesa-daraja-api-integration-guide',
                'title' => 'M-Pesa Daraja API Integration: A Practical Guide for Businesses',
                'excerpt' => 'What every business should know before integrating M-Pesa into a website or app — STK Push, C2B, B2C, callbacks, reconciliation and going live with Safaricom.',
                'category' => 'Engineering',
                'published_at' => '2026-10-21',
                'updated_at' => '2026-10-21',
                'keywords' => ['M-Pesa Daraja API integration', 'STK Push integration Kenya', 'M-Pesa developer Nairobi'],
                'body' => <<<'MD'
M-Pesa is how most Kenyans pay, so a smooth M-Pesa checkout is often the single biggest conversion lever for a Kenyan website or app. Safaricom exposes M-Pesa to developers through the **Daraja API**. This guide covers the decisions and pitfalls we see most often.

## Choose the right API

- **STK Push (Lipa Na M-Pesa Online)** — your system triggers a payment prompt on the customer's phone. Best for online checkout.
- **C2B** — customers pay to your paybill or till from their phone and your system is notified. Best for invoices, rent and account top-ups.
- **B2C** — your business sends money to customers. Used for refunds, loan disbursements and payouts.
- **Transaction Status and Account Balance** — used for reconciliation and support tools.

## Design for callbacks, not responses

The response you receive when you start an STK Push only confirms that the request was accepted. The real result arrives later at your **callback URL**. Your system must:

1. Store every request with a unique reference before calling Daraja.
2. Accept callbacks idempotently — the same callback can arrive more than once.
3. Query the transaction status if a callback never arrives.
4. Never mark an order as paid based on what the browser reports.

## Reconcile every day

Even well-built integrations need a daily reconciliation job that compares your records against M-Pesa statements. It catches missed callbacks, duplicate payments and manual payments made to your paybill without the right account number.

## Going live

Development happens in the Daraja sandbox. To go live you need an active paybill or till, an organisation account on the Daraja portal and production credentials. Plan for this approval step in your timeline — it is the most common cause of launch delays we see.

## Security checklist

- Keep consumer keys and passkeys in environment variables, never in code.
- Serve callbacks over HTTPS only and validate the payload against your stored request.
- Log every request and callback for auditing.
- Restrict B2C permissions and require approvals for large payouts.

## Beyond Kenya

The same patterns apply to MTN MoMo in Uganda and Ghana, Vodacom M-Pesa in Tanzania and Paystack or Flutterwave in Nigeria. Building a payment abstraction from day one makes expanding to new markets far easier.

Need help? Our team has integrated M-Pesa into marketplaces, rent collection systems and e-commerce stores — [talk to us](/contact).
MD,
            ],
            [
                'slug' => 'data-protection-laws-africa-software',
                'title' => 'Data Protection Laws for Software Teams in Kenya, Uganda, Tanzania, Nigeria and Ghana',
                'excerpt' => 'A plain-language overview of the data protection laws that affect software products in five African markets, and the engineering practices that help you comply.',
                'category' => 'Compliance',
                'published_at' => '2026-09-30',
                'updated_at' => '2026-09-30',
                'keywords' => ['Kenya Data Protection Act software', 'NDPA Nigeria compliance', 'data protection Africa apps'],
                'body' => <<<'MD'
If your product collects personal data from users in East or West Africa, data protection law applies to you. This overview is written for founders and product teams. It is not legal advice — always confirm obligations with a qualified lawyer.

## The laws at a glance

| Country | Law | Regulator |
| --- | --- | --- |
| Kenya | Data Protection Act, 2019 | Office of the Data Protection Commissioner (ODPC) |
| Uganda | Data Protection and Privacy Act, 2019 | Personal Data Protection Office (PDPO) |
| Tanzania | Personal Data Protection Act, 2022 | Personal Data Protection Commission (PDPC) |
| Nigeria | Nigeria Data Protection Act, 2023 | Nigeria Data Protection Commission (NDPC) |
| Ghana | Data Protection Act, 2012 (Act 843) | Data Protection Commission |

## Common obligations

Although the details differ, the five laws share core principles:

- **Lawful basis and consent** — know why you collect each piece of data and get clear consent where it is required.
- **Purpose limitation and minimisation** — collect only what you need and use it only for the stated purpose.
- **Data subject rights** — users can access, correct and request deletion of their data.
- **Security** — protect data with appropriate technical and organisational measures.
- **Breach notification** — report qualifying breaches to the regulator within the required time.
- **Registration** — several regulators require data controllers and processors to register.
- **Cross-border transfers** — moving data abroad (including to foreign cloud regions) may need safeguards.

## Engineering practices that help

1. **Map your data.** Keep a simple register of what personal data you store, where and why.
2. **Encrypt by default** — in transit with HTTPS and at rest for sensitive fields.
3. **Role-based access and audit logs** so you can show who accessed what.
4. **Self-service privacy tools** for exporting and deleting a user's data.
5. **Retention rules** that automatically delete data you no longer need.
6. **Vendor review** of every third-party service that receives personal data.

Building these in from the first sprint is far cheaper than retrofitting them. Every system Propify Solutions builds includes role-based access, audit logging and encrypted backups as standard.
MD,
            ],
        ];
    }
}
