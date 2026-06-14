<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfolio;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $portfolios = Portfolio::active()->get();
        $blogs = Blog::published()->get();

        $content = view('sitemap', compact('portfolios', 'blogs'));

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
