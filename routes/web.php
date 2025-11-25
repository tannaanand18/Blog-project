<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Http\Controllers\BlogController;

// ----------------------
// Home Page
// ----------------------
Route::get('/', function () {
    $blogs = Blog::latest()->get();
    return view('index', compact('blogs'));
})->name('home');

// ----------------------
// Static Pages
// ----------------------
Route::get('/about', function () {
    return view('about');
})->name('about');

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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ----------------------
// Profile (Breeze)
// ----------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
