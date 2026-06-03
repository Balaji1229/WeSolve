<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $query = Portfolio::active()->ordered();

        if ($category && in_array($category, ['Website', 'App', 'SEO'])) {
            $query->byCategory($category);
        }

        $portfolios = $query->paginate(9);
        $categories = Portfolio::select('category')->distinct()->pluck('category');

        return view('portfolio', compact('portfolios', 'categories', 'category'));
    }

    public function show($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        return view('portfolio-detail', compact('portfolio'));
    }
}
