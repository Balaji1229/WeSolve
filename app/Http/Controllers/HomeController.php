<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::active()->ordered()->limit(6)->get();
        // All active testimonials are rendered on the page AND drive the
        // Review/AggregateRating schema, so the two stay in sync (no drift).
        $testimonials = Testimonial::active()->ordered()->get();
        $blogs = Blog::published()->recent()->limit(3)->get();

        $heroTitle = Setting::get('hero_title', 'Affordable Website & App Development');
        $heroSubtitle = Setting::get('hero_subtitle', 'Professional digital solutions for small businesses and startups');

        return view('home', compact('portfolios', 'testimonials', 'blogs', 'heroTitle', 'heroSubtitle'));
    }
}
