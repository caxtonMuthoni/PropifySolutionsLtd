<?php

use App\Http\Controllers\AgentResourceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/robots.txt', [AgentResourceController::class, 'robots'])->name('robots');
Route::get('/sitemap.xml', [AgentResourceController::class, 'sitemap'])->name('sitemap');
Route::get('/llms.txt', [AgentResourceController::class, 'llms'])->name('llms');
Route::get('/llms-full.txt', [AgentResourceController::class, 'llmsFull'])->name('llms.full');
Route::get('/index.md', [AgentResourceController::class, 'markdown'])->name('markdown.home');
Route::get('/{path}.md', [AgentResourceController::class, 'markdown'])
    ->where('path', '[a-z0-9\-]+(\/[a-z0-9\-]+)?')
    ->name('markdown');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/industries', [IndustryController::class, 'index'])->name('industries');
Route::get('/industries/{slug}', [IndustryController::class, 'show'])->name('industries.show');

Route::get('/locations', [LocationController::class, 'index'])->name('locations');
Route::get('/locations/{slug}', [LocationController::class, 'show'])->name('locations.show');

Route::get('/insights', [InsightController::class, 'index'])->name('insights');
Route::get('/insights/{slug}', [InsightController::class, 'show'])->name('insights.show');

Route::get('/process', [PageController::class, 'process'])->name('process');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('/profile', 'profile')->middleware('auth')->name('profile');

require __DIR__.'/auth.php';
