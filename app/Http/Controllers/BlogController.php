<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }


    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        // Store the image in 'storage/app/public/images' and return the path
        $imagePath = $request->file('image')->store('images', 'public');
    }

    Blog::create([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imagePath,
        'author' => Auth::user()->name, // Use the name of the logged-in user
    ]);

    return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
}

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id); // Retrieve the blog or show a 404 error
        return view('blog.edit', compact('blog')); // Return the edit view with the blog data
    }

    /**
     * Update the specified blog in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update($request->only(['title', 'content']));

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);  // Retrieve the blog post by ID, or 404 if not found
        return view('blog.show', compact('blog'));  // Render the view with blog data
    }

}
