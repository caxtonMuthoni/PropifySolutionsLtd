<?php

namespace App\Http\Controllers;

use App\Services\Content\ArticleCatalog;
use App\Services\SeoService;
use Illuminate\Contracts\View\View;

class InsightController extends Controller
{
    public function index(SeoService $seo, ArticleCatalog $articles): View
    {
        $allArticles = collect($articles->all())->map(fn (array $article): array => collect($article)->except('body')->all())->all();

        return view('site.insights.index', [
            'seo' => $seo->page(
                title: 'Insights – Software Development Guides for African Businesses',
                description: 'Practical guides on software costs, M-Pesa and mobile money integration, data protection and building digital products in Kenya and across Africa.',
                path: '/insights',
                keywords: ['software development blog Kenya', 'M-Pesa integration guide', 'app development cost Kenya'],
                breadcrumbs: [['name' => 'Insights', 'path' => '/insights']],
                schema: [$seo->itemList('/insights', 'Insights', collect($allArticles)->map(fn (array $article): array => [
                    'name' => $article['title'],
                    'path' => "/insights/{$article['slug']}",
                ])->all())],
            ),
            'articles' => $allArticles,
        ]);
    }

    public function show(string $slug, SeoService $seo, ArticleCatalog $articles): View
    {
        $article = $articles->find($slug) ?? abort(404);
        $path = "/insights/{$slug}";

        return view('site.insights.show', [
            'seo' => $seo->page(
                title: $article['title'],
                description: $article['excerpt'],
                path: $path,
                keywords: $article['keywords'],
                breadcrumbs: [['name' => 'Insights', 'path' => '/insights'], ['name' => $article['title'], 'path' => $path]],
                schema: [[
                    '@type' => 'BlogPosting',
                    '@id' => $seo->url($path).'#article',
                    'headline' => $article['title'],
                    'description' => $article['excerpt'],
                    'datePublished' => $article['published_at'],
                    'dateModified' => $article['updated_at'],
                    'articleSection' => $article['category'],
                    'keywords' => implode(', ', $article['keywords']),
                    'wordCount' => str_word_count($article['body']),
                    'inLanguage' => 'en',
                    'image' => $seo->defaultImage(),
                    'mainEntityOfPage' => ['@id' => $seo->url($path).'#webpage'],
                    'author' => ['@id' => $seo->organizationId()],
                    'publisher' => ['@id' => $seo->organizationId()],
                ]],
                type: 'article',
                publishedTime: $article['published_at'],
                modifiedTime: $article['updated_at'],
            ),
            'article' => [...collect($article)->except('body')->all(), 'html' => $articles->html($article['body'])],
            'moreArticles' => collect($articles->all())
                ->reject(fn (array $other): bool => $other['slug'] === $slug)
                ->map(fn (array $other): array => collect($other)->except('body')->all())
                ->values()
                ->all(),
        ]);
    }
}
