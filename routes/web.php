<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\PageSeoController as AdminPageSeoController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\TemplateController as AdminTemplateController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/developers', function () {
    return view('developers');
})->name('developers');
Route::get('/terms-and-conditions', function () {
    return view('terms');
})->name('terms');
Route::get('/services', function () {
    return view('services.index');
})->name('services');

Route::get('/services/website-development', function () {
    return view('services.website-development');
})->name('service.website-development');

Route::get('/services/web-application-development', function () {
    return view('services.web-application-development');
})->name('service.web-application-development');

Route::get('/services/mobile-app-development', function () {
    return view('services.mobile-app-development');
})->name('service.mobile-app-development');

Route::get('/services/digital-marketing', function () {
    return view('services.digital-marketing');
})->name('service.digital-marketing');

Route::get('/services/ai-automation-solutions', function () {
    return view('services.ai-automation-solutions');
})->name('service.ai-automation-solutions');

Route::get('/services/ui-ux-design', function () {
    return view('services.ui-ux-design');
})->name('service.ui-ux-design');

Route::get('/services/cloud-solutions', function () {
    return view('services.cloud-solutions');
})->name('service.cloud-solutions');

Route::get('/services/maintenance-support', function () {
    return view('services.maintenance-support');
})->name('service.maintenance-support');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/chatbot/message', [ChatbotController::class, 'message'])->name('chatbot.message');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Dynamic robots.txt (uses the configured APP_URL so the Sitemap line stays correct per environment)
Route::get('/robots.txt', function () {
    $sitemap = rtrim(config('app.url'), '/') . '/sitemap.xml';

    // Staging / pre-launch safety: when the site is not indexable, block everything.
    if (! config('seo.indexable', true)) {
        return response("User-agent: *\nDisallow: /\n", 200)
            ->header('Content-Type', 'text/plain');
    }

    $lines = [
        'User-agent: *',
        'Allow: /',
        '',
        'Disallow: /admin/',
        'Disallow: /login',
        'Disallow: /dashboard/',
        '',
    ];

    // Explicitly welcome AI crawlers so the site can be cited in AI answers.
    foreach (config('seo.ai_crawlers', []) as $bot) {
        $lines[] = 'User-agent: ' . $bot;
        $lines[] = 'Allow: /';
        $lines[] = '';
    }

    $lines[] = 'Sitemap: ' . $sitemap;
    $lines[] = '';

    return response(implode("\n", $lines), 200)
        ->header('Content-Type', 'text/plain');
})->name('robots');

// Templates showcase
Route::get('/templates', function () {
    $templates = \App\Models\Template::active()->ordered()->get();

    $categories = \App\Models\Template::CATEGORIES;

    return view('templates', compact('templates', 'categories'));
})->name('templates');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Admin Routes
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Blogs
        Route::resource('blogs', AdminBlogController::class);

        // Portfolios
        Route::resource('portfolios', AdminPortfolioController::class);

        // Testimonials
        Route::resource('testimonials', AdminTestimonialController::class);

        // Templates
        Route::resource('templates', AdminTemplateController::class);

        // Contacts
        Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
        Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
        Route::post('/contacts/{contact}/read', [AdminContactController::class, 'markAsRead'])->name('contacts.read');

        // SEO
        Route::resource('seo', AdminPageSeoController::class)->only(['index', 'edit', 'update']);

        // Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
