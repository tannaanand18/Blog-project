<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'blog_id' => $blog->id,
            'comment' => $request->comment,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'id'          => $comment->id,
                'comment'     => $comment->comment,
                'user_name'   => $comment->user->name,
                'created_hum' => $comment->created_at->diffForHumans(),
            ]);
        }

        return back();
    }

    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment->update([
            'comment' => $request->comment,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'id'          => $comment->id,
                'comment'     => $comment->comment,
                'updated_hum' => $comment->updated_at->diffForHumans(),
            ]);
        }

        return back();
    }

    public function destroy(Request $request, Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(403);
        }

        $comment->delete();

        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return back();
    }
}
