<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $blogs = Blog::query()->with('user')->get();

        return view('blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showBlog(Blog $blog)
    {
        $blog->load('comments');

        return view('blog', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add.blog');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'content' => 'required|string',
            'created_by' => 'required|integer',
        ]);

        Blog::create($validated);

        return redirect()->route('blogs')->with('success', 'Blog added successfully!');
    }

    /**
     * Delete a resource from storage.
     */
    public function delete(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs')->with('success', 'Blog deleted successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('edit.blog', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $blog->update($validated);

        return redirect()->route('blogs')->with('success', 'Blog updated successfully!');
    }
}
