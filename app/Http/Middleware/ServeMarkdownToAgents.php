<?php

namespace App\Http\Middleware;

use App\Services\MarkdownExporter;
use App\Services\SeoService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Content negotiation for AI agents: a GET request that prefers
 * text/markdown over text/html receives the Markdown rendition of the page.
 */
class ServeMarkdownToAgents
{
    public function __construct(public MarkdownExporter $exporter, public SeoService $seo) {}

    /**
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->isMethod('GET')) {
            return $next($request);
        }

        if (! $this->prefersMarkdown($request) || ($markdown = $this->exporter->forPath($request->path())) === null) {
            return $this->advertiseMarkdown($request, $next($request));
        }

        return response($markdown, 200, [
            'Content-Type' => 'text/markdown; charset=UTF-8',
            'Vary' => 'Accept',
            'Link' => '<'.$this->seo->url($request->path()).'>; rel="canonical"',
        ]);
    }

    private function advertiseMarkdown(Request $request, Response $response): Response
    {
        $path = '/'.trim($request->path(), '/');
        $isPublicPage = collect($this->exporter->pages())->contains('path', $path);

        if ($isPublicPage && str_contains((string) $response->headers->get('Content-Type'), 'text/html')) {
            $response->headers->set('Vary', 'Accept', false);
            $agentLinks = '<'.$this->seo->markdownUrl($path).'>; rel="alternate"; type="text/markdown", <'.$this->seo->url('/llms.txt').'>; rel="describedby"; type="text/plain"';
            $existingLinks = implode(', ', $response->headers->all('link'));
            $response->headers->set('Link', $existingLinks === '' ? $agentLinks : "{$existingLinks}, {$agentLinks}");
        }

        return $response;
    }

    private function prefersMarkdown(Request $request): bool
    {
        $accepted = $request->getAcceptableContentTypes();
        $markdownIndex = array_search('text/markdown', $accepted, true);
        $htmlIndex = array_search('text/html', $accepted, true);

        return $markdownIndex !== false && ($htmlIndex === false || $markdownIndex < $htmlIndex);
    }
}
