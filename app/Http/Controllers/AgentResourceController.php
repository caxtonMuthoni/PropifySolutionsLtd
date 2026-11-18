<?php

namespace App\Http\Controllers;

use App\Services\MarkdownExporter;
use App\Services\SeoService;
use Illuminate\Http\Response;

class AgentResourceController extends Controller
{
    /**
     * Search and AI crawlers that are explicitly welcome.
     *
     * @var list<string>
     */
    private const WELCOME_AGENTS = [
        'Googlebot', 'Bingbot', 'DuckDuckBot', 'Applebot', 'Applebot-Extended', 'Google-Extended',
        'GPTBot', 'OAI-SearchBot', 'ChatGPT-User', 'ClaudeBot', 'Claude-User', 'Claude-SearchBot',
        'PerplexityBot', 'Perplexity-User', 'Meta-ExternalAgent', 'MistralAI-User', 'CCBot',
    ];

    public function robots(SeoService $seo): Response
    {
        $disallow = ['/dashboard', '/profile', '/login', '/register', '/forgot-password', '/reset-password', '/verify-email', '/confirm-password'];
        $rules = collect($disallow)->map(fn (string $path): string => "Disallow: {$path}")->implode("\n");

        $agents = collect(self::WELCOME_AGENTS)->map(fn (string $agent): string => "User-agent: {$agent}")->implode("\n");

        $body = <<<TXT
# Propify Solutions — humans, search engines and AI agents are welcome.
# Agent-friendly index: {$seo->url('/llms.txt')}

User-agent: *
Allow: /
{$rules}

{$agents}
Allow: /
{$rules}

Sitemap: {$seo->url('/sitemap.xml')}
TXT;

        return $this->text($body."\n", 'text/plain');
    }

    public function sitemap(MarkdownExporter $exporter, SeoService $seo): Response
    {
        $entries = collect($exporter->pages())->map(fn (array $page): string => implode('', [
            '  <url>',
            '<loc>'.e($seo->url($page['path'])).'</loc>',
            "<lastmod>{$page['lastmod']}</lastmod>",
            "<changefreq>{$page['changefreq']}</changefreq>",
            "<priority>{$page['priority']}</priority>",
            '</url>',
        ]))->implode("\n");

        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n{$entries}\n</urlset>\n";

        return $this->text($xml, 'application/xml');
    }

    public function llms(MarkdownExporter $exporter): Response
    {
        return $this->text($exporter->llmsTxt(), 'text/plain');
    }

    public function llmsFull(MarkdownExporter $exporter): Response
    {
        return $this->text($exporter->llmsFull(), 'text/plain');
    }

    public function markdown(MarkdownExporter $exporter, SeoService $seo, string $path = 'index'): Response
    {
        $markdown = $exporter->forPath($path === 'index' ? '/' : $path) ?? abort(404);

        return $this->text($markdown, 'text/markdown')
            ->header('Link', '<'.$seo->url($path === 'index' ? '/' : $path).'>; rel="canonical"')
            ->header('X-Robots-Tag', 'noindex');
    }

    private function text(string $body, string $type): Response
    {
        return response($body, 200, [
            'Content-Type' => "{$type}; charset=UTF-8",
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}
