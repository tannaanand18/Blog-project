<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Models\Blog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//
// Home Page
//
=======
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Http\Controllers\BlogController;

// ----------------------
// Home Page
// ----------------------
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81
Route::get('/', function () {
    $blogs = Blog::latest()->get();
    return view('index', compact('blogs'));
})->name('home');

<<<<<<< HEAD
//
// Static Pages
//
=======
// ----------------------
// Static Pages
// ----------------------
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81
Route::get('/about', function () {
    return view('about');
})->name('about');

<<<<<<< HEAD
//
// Blog Routes
//
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blogs.show');

// Add blog (logged-in users only)
Route::middleware('auth')->group(function () {
    Route::get('/add-blog', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/store-blog', [BlogController::class, 'store'])->name('store.blog');
});

//
// Like + Comment routes (AJAX enabled)
//
Route::middleware('auth')->group(function () {
    // Like / Unlike blog
    Route::post('/blog/{blog}/like', [LikeController::class, 'toggle'])->name('blog.like');

    // Comments
    Route::post('/blog/{blog}/comment', [CommentController::class, 'store'])->name('blog.comment');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

//
// User Dashboard (Breeze)
//
=======
// ----------------------
// Blog Routes
// ----------------------
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/add-blog', [BlogController::class, 'create'])->middleware('auth');
Route::post('/store-blog', [BlogController::class, 'store'])->middleware('auth')->name('store.blog');

// ----------------------
// User Dashboard (Breeze)
// ----------------------
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

<<<<<<< HEAD
//
// Profile (Breeze)
//
=======
// ----------------------
// Profile (Breeze)
// ----------------------
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
