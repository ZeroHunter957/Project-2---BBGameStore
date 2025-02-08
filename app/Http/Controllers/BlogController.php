<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;  // Add this line for logging

class BlogController extends Controller
{
    // Show the list of blogs
    public function index(Request $request)
    {
        $query = Blog::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->paginate(5); // Paginate the blogs

        return view('blogs.index', compact('blogs'));
    }

    // Show the form to create a new blog
    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'nullable', // Make content optional
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image types and size
            ]);

            // Handle image upload (if available)
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('img', 'public'); // Store image in public/img
            }

            // Create the blog post
            Blog::create([
                'title' => $request->title,
                'content' => $request->content,  // This will now be nullable
                'image' => $imagePath, // Save image path
            ]);

            // Return a JSON response on success
            return response()->json(['message' => 'Blog created successfully.'], 200);
        } catch (\Exception $e) {
            Log::error('Error creating blog: ' . $e->getMessage());  // Log error details
            return response()->json(['error' => 'An error occurred while creating the blog.'], 500);
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
{
    try {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        $blog = Blog::findOrFail($id);

        $imagePath = $blog->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $request->file('image')->store('img', 'public');
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    } catch (\Exception $e) {
        Log::error('Error updating blog: ' . $e->getMessage(), [
            'stack' => $e->getTraceAsString(),
            'request_data' => $request->all(),
        ]);

        return response()->json(['error' => 'An error occurred while updating the blog.'], 500);
    }
}



    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);

            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $blog->delete();

            return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting blog: ' . $e->getMessage());
            return redirect()->route('blogs.index')->with('error', 'An error occurred while deleting the blog.');
        }
    }
}
