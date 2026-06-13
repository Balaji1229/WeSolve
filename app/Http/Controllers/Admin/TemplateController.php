<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $query = Template::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $templates = $query->orderBy('sort_order')->orderByDesc('id')->paginate(10)->withQueryString();
        $categories = Template::CATEGORIES;

        return view('admin.templates.index', compact('templates', 'categories'));
    }

    public function create()
    {
        $categories = Template::CATEGORIES;
        return view('admin.templates.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:' . implode(',', Template::CATEGORIES),
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('templates', 'public');
            $validated['image'] = $path;
        }

        Template::create($validated);

        return redirect()->route('admin.templates.index')
            ->with('success', 'Template created successfully.');
    }

    public function edit(Template $template)
    {
        $categories = Template::CATEGORIES;
        return view('admin.templates.edit', compact('template', 'categories'));
    }

    public function update(Request $request, Template $template)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:' . implode(',', Template::CATEGORIES),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            if ($template->image) {
                Storage::disk('public')->delete($template->image);
            }
            $path = $request->file('image')->store('templates', 'public');
            $validated['image'] = $path;
        }

        $template->update($validated);

        return redirect()->route('admin.templates.index')
            ->with('success', 'Template updated successfully.');
    }

    public function destroy(Template $template)
    {
        if ($template->image) {
            Storage::disk('public')->delete($template->image);
        }
        $template->delete();

        return redirect()->route('admin.templates.index')
            ->with('success', 'Template deleted successfully.');
    }
}
