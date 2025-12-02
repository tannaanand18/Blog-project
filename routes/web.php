<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Models\Blog;


Route::get('/', function () {
    $blogs = Blog::latest()->get();
    return view('index', compact('blogs'));
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blogs.show');

Route::middleware('auth')->group(function () {
    Route::get('/add-blog', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/store-blog', [BlogController::class, 'store'])->name('store.blog');
    Route::post('/blog/{blog}/like', [LikeController::class, 'toggle'])->name('blog.like');
    Route::post('/blog/{blog}/comment', [CommentController::class, 'store'])->name('blog.comment');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
