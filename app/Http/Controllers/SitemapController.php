<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $services = Service::active()->get();
        $portfolios = Portfolio::active()->get();
        $blogs = Blog::published()->get();

        $content = view('sitemap', compact('services', 'portfolios', 'blogs'));

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
