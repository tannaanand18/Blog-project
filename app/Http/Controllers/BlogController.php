<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // Show Add Blog Form
    public function create()
    {
        return view('create-blog');
    }

    // Store Blog in Database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->description = $request->description;

        if($request->hasFile('image')){
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();

        return redirect('/blogs')->with('success', 'Blog Added Successfully!');
    }

    // ✅ Show All Blogs Page
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blogs', compact('blogs'));
    }

    // ✅ Show Single Blog Page
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog-details', compact('blog'));
    }
}

