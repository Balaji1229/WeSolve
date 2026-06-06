<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = Portfolio::latest();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $portfolios = $query->paginate(10);
        return view('admin.portfolios.index', compact('portfolios', 'search'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolios',
            'category' => 'required|string|in:Website,App,SEO',
            'description' => 'required|string',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'technology_used' => 'required|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'client_name' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('project_image')) {
            $path = $request->file('project_image')->store('portfolios', 'public');
            $validated['project_image'] = $path;
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio created successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolios,slug,' . $portfolio->id,
            'category' => 'required|string|in:Website,App,SEO',
            'description' => 'required|string',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'technology_used' => 'required|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'client_name' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('project_image')) {
            if ($portfolio->project_image) {
                Storage::disk('public')->delete($portfolio->project_image);
            }
            $path = $request->file('project_image')->store('portfolios', 'public');
            $validated['project_image'] = $path;
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->project_image) {
            Storage::disk('public')->delete($portfolio->project_image);
        }
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio deleted successfully.');
    }
}
