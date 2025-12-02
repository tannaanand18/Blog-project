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

<<<<<<< HEAD
    // Show Blogs Page (with like count, comment count, and category filter)
=======
    // Show Blogs (Category Filter)
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

<<<<<<< HEAD
        $query = Blog::with(['category', 'likes', 'comments'])->latest();
=======
        $query = Blog::with('category')->latest();
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81

        if ($request->has('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        $blogs = $query->get();
<<<<<<< HEAD

        return view('blogs', compact('blogs', 'categories'));
    }

    // Show Single Blog Page (with category, likes, comments, and user)
    public function show($id)
    {
        $blog = Blog::with(['category', 'likes', 'comments.user'])->findOrFail($id);
=======
        return view('blogs', compact('blogs', 'categories'));
    }

    // Show Single Blog
    public function show($id)
    {
        $blog = Blog::with('category')->findOrFail($id);
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81
        return view('blog-details', compact('blog'));
    }
}
