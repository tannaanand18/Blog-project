<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Request $request, Blog $blog)
    {
        $userId = Auth::id();

        $existingLike = Like::where('user_id', $userId)
            ->where('blog_id', $blog->id)
            ->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $liked = false;
        } else {
            // Like
            Like::create([
                'user_id' => $userId,
                'blog_id' => $blog->id,
            ]);
            $liked = true;
        }

        $likesCount = $blog->likes()->count();

        // AJAX request
        if ($request->expectsJson()) {
            return response()->json([
                'liked'       => $liked,
                'likes_count' => $likesCount,
            ]);
        }

        // Normal form fallback
        return back();
    }
}
