<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->limit(6)->get();
        $portfolios = Portfolio::active()->ordered()->limit(6)->get();
        $testimonials = Testimonial::active()->ordered()->limit(6)->get();
        $blogs = Blog::published()->recent()->limit(3)->get();

        $heroTitle = Setting::get('hero_title', 'Affordable Website & App Development');
        $heroSubtitle = Setting::get('hero_subtitle', 'Professional digital solutions for small businesses and startups');

        return view('home', compact('services', 'portfolios', 'testimonials', 'blogs', 'heroTitle', 'heroSubtitle'));
    }
}
