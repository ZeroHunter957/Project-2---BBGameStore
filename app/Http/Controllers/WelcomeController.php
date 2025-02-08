<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $latestBlogs = Blog::orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('latestBlogs'));
    }

    public function shop(Request $request)
    {
        $search = $request->input('search'); 
    
        $latestBlogs = Blog::when($search, function($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(4);

        return view('shop', compact('latestBlogs', 'search'));
    }

    public function detail($id)
    {
        $blog = Blog::findOrFail($id); 
        return view('detail', compact('blog'));
    }
}

