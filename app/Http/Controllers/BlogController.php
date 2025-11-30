<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    // Show Add Blog Form
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('create-blog', compact('categories'));
    }

    // Store Blog
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|max:255',
            'description'  => 'required',
            'image'        => 'nullable|image',
            'category_id'  => 'required|exists:categories,id',
        ]);

        $blog = new Blog();
        $blog->title       = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog Added Successfully!');
    }

    // Show Blogs (Category Filter)
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $query = Blog::with('category')->latest();

        if ($request->has('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        $blogs = $query->get();
        return view('blogs', compact('blogs', 'categories'));
    }

    // Show Single Blog
    public function show($id)
    {
        $blog = Blog::with('category')->findOrFail($id);
        return view('blog-details', compact('blog'));
    }
}
