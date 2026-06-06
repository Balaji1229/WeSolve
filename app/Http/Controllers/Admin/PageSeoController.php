<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageSeoController extends Controller
{
    public function index()
    {
        $pageSeos = PageSeo::orderBy('page')->get();
        return view('admin.seo.index', compact('pageSeos'));
    }

    public function edit(PageSeo $seo)
    {
        return view('admin.seo.edit', compact('seo'));
    }

    public function update(Request $request, PageSeo $seo)
    {
        $validated = $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('og_image')) {
            if ($seo->og_image && Storage::disk('public')->exists($seo->og_image)) {
                Storage::disk('public')->delete($seo->og_image);
            }
            $validated['og_image'] = $request->file('og_image')->store('seo', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        $seo->update($validated);

        return redirect()->route('admin.seo.index')->with('success', 'SEO settings updated successfully.');
    }
}
