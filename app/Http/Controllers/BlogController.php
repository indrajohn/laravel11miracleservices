<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Inertia\Inertia;
use Illuminate\Http\Request;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return Inertia::render('Dashboard/Blogs/Index', [
            'blogs' => $blogs,
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Blogs/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Blog::create($request->all());

        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog)
    {
        return Inertia::render('Dashboard/Blogs/Edit', [
            'blog' => $blog,
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog->update($request->all());

        return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
