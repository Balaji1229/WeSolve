<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = Blog::published()->recent();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        $blogs = $query->paginate(9);

        return view('blog', compact('blogs', 'search'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->published()->firstOrFail();
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->recent()
            ->limit(3)
            ->get();

        return view('blog-detail', compact('blog', 'relatedBlogs'));
    }
}
